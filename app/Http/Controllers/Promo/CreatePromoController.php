<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\City\GetCitiesAction;
use App\Actions\Menu\GetMenuItemsAction;
use App\Actions\Promo\CreatePromoAction;
use App\Actions\Promo\GetPromoTypesAction;
use App\Data\CreatePromoData;
use App\Enums\MenuType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promo\CreatePromoRequest;
use App\Settings\GeneralSettings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;
use Throwable;

class CreatePromoController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        $user = auth()->user();

        return Inertia::render('Promo/CreatePromo', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'categories' => GetCategoriesAction::run(),
            'cities' => GetCitiesAction::run(),
            'promoTypes' => GetPromoTypesAction::run(),
            'discountFilters' => config('promo.discount_filters'),
            'defaultDescription' => config('promo.default_description'),
            'weekdays' => config('promo.weekdays'),
            'socialNetworks' => config('promo.social_networks'),
            'userBalance' => $user?->balance?->toFloat() ?? 0,
            'activePromosCount' => $user?->activePromos()->count() ?? 0,
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
            'sidebarMenu' => GetMenuItemsAction::run(MenuType::SIDEBAR),
        ]);
    }

    public function store(CreatePromoRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $userId = auth()->id();

        $dto = CreatePromoData::from([
            ...$validated,
            'user_id' => $userId,
        ]);

        try {
            $promo = CreatePromoAction::run($dto);
        } catch (Throwable $e) {
            Log::error('❌ Ошибка при создании промо/купона', [
                'user_id' => $userId,
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_trace' => $e->getTraceAsString(),
                'validated_data' => $validated,
            ]);

            throw $e;
        }

        $message = $validated['is_draft'] ?? false
            ? 'Акция сохранена как черновик'
            : 'Акция успешно создана и отправлена на модерацию';

        return redirect()
            ->route('promos.create')
            ->with('success', $message);
    }
}
