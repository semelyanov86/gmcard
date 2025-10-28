<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Actions\Category\GetCategoriesAction;
use App\Actions\City\GetCitiesAction;
use App\Actions\Promo\CreatePromoAction;
use App\Actions\Promo\GetPromoTypesAction;
use App\Data\CreatePromoData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promo\CreatePromoRequest;
use App\Settings\GeneralSettings;
use App\ValueObjects\MoneyValueObject;
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
        ]);
    }

    public function store(CreatePromoRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $userId = auth()->id();

        $dataForDto = [
            ...$validated,
            'user_id' => $userId,
        ];

        // Преобразуем discount_amount и discount_currency в MoneyValueObject
        if (isset($validated['discount_amount']) && $validated['discount_amount'] !== null) {
            $currency = $this->getCurrency($validated['discount_currency'] ?? '%');
            $dataForDto['discount'] = MoneyValueObject::fromString(
                (string) $validated['discount_amount'],
                $currency
            );
            unset($dataForDto['discount_amount'], $dataForDto['discount_currency']);
        }

        // Преобразуем cashback_amount и cashback_currency в MoneyValueObject
        if (isset($validated['cashback_amount']) && $validated['cashback_amount'] !== null) {
            $currency = $this->getCurrency($validated['cashback_currency'] ?? '%');
            $dataForDto['cashback'] = MoneyValueObject::fromString(
                (string) $validated['cashback_amount'],
                $currency
            );
            unset($dataForDto['cashback_amount'], $dataForDto['cashback_currency']);
        }

        // Преобразуем minimum_order_amount в MoneyValueObject
        if (isset($validated['minimum_order_amount']) && $validated['minimum_order_amount'] !== null) {
            $dataForDto['minimum_order'] = MoneyValueObject::fromString(
                (string) $validated['minimum_order_amount'],
                'RUB'
            );
            unset($dataForDto['minimum_order_amount']);
        }

        // Преобразуем free_delivery_from в MoneyValueObject
        if (isset($validated['free_delivery_from']) && $validated['free_delivery_from'] !== null) {
            $dataForDto['free_delivery_from'] = MoneyValueObject::fromString(
                (string) $validated['free_delivery_from'],
                'RUB'
            );
        }

        $dto = CreatePromoData::from($dataForDto);

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

    private function getCurrency(string $currencyInput): string
    {
        return match ($currencyInput) {
            '%' => 'PCT',
            '₽', 'руб' => 'RUB',
            default => 'RUB',
        };
    }
}
