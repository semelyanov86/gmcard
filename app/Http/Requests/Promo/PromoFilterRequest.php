<?php

declare(strict_types=1);

namespace App\Http\Requests\Promo;

use Illuminate\Foundation\Http\FormRequest;

class PromoFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, list<string>>
     */
    public function rules(): array
    {
        return [
            'city' => ['nullable', 'integer', 'exists:cities,id'],
            'min_discount' => ['nullable', 'integer', 'min:1', 'max:100'],
            'promo_type' => ['nullable', 'integer', 'exists:promo_types,id'],
            'search' => ['nullable', 'string', 'max:255'],
        ];
    }

    /**
     * @return array{city: int|null, min_discount: int|null, promo_type: int|null, search: string|null}
     */
    public function filters(): array
    {
        $searchRaw = $this->input('search');
        $search = is_string($searchRaw) ? mb_trim($searchRaw) : '';

        return [
            'city' => $this->integer('city') ?: null,
            'min_discount' => $this->integer('min_discount') ?: null,
            'promo_type' => $this->integer('promo_type') ?: null,
            'search' => $search !== '' ? $search : null,
        ];
    }
}
