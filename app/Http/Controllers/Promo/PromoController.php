<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\City\GetCitiesAction;
use App\Actions\Menu\GetMenuItemsAction;
use App\Actions\Promo\CompletePromoAction;
use App\Actions\Promo\GetPromoTypesAction;
use App\Actions\Promo\UpdatePromoAction;
use App\Data\CreatePromoData;
use App\Data\PromoFormData;
use App\Enums\MenuType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promo\UpdatePromoRequest;
use App\Models\Promo;
use App\Settings\GeneralSettings;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class PromoController extends Controller
{
    public function edit(Promo $promo, GeneralSettings $settings): Response
    {
        $this->authorizePromo($promo);

        $user = auth()->user();

        return Inertia::render('Promo/EditPromo', [
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
            'user' => $user,
            'navbarMenu' => GetMenuItemsAction::run(MenuType::NAVBAR),
            'sidebarMenu' => GetMenuItemsAction::run(MenuType::SIDEBAR),
            'promo' => PromoFormData::fromPromo($promo),
        ]);
    }

    public function update(UpdatePromoRequest $request, Promo $promo): RedirectResponse
    {
        $this->authorizePromo($promo);

        $user = auth()->user();
        assert($user !== null);

        $dto = CreatePromoData::from([
            ...$request->validated(),
            'user_id' => $user->id,
            'id' => $promo->id,
            'existing_photo' => $request->input('existing_photo'),
        ]);

        UpdatePromoAction::run($dto);

        return redirect()
            ->route('profile')
            ->with('success', 'Акция обновлена');
    }

    public function destroy(Promo $promo): RedirectResponse
    {
        $this->authorizePromo($promo);

        $promo->delete();

        return redirect()
            ->back()
            ->with('success', 'Акция удалена');
    }

    public function complete(Promo $promo): RedirectResponse
    {
        $this->authorizePromo($promo);

        CompletePromoAction::run($promo);

        return redirect()
            ->route('profile')
            ->with('success', 'Акция завершена');
    }

    private function authorizePromo(Promo $promo): void
    {
        abort_if($promo->user_id !== auth()->id(), 403);
    }
}
