<?php

declare(strict_types=1);

namespace App\Http\Requests\Promo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePromoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'promo_type_id' => ['required', 'integer', 'min:1', 'max:7'],
            'discount_amount' => [
                'nullable',
                'numeric',
                'min:0',
                Rule::requiredIf(fn () => in_array($this->input('promo_type_id'), [1, 2, 3])),
            ],
            'discount_currency' => [
                'nullable',
                'string',
                Rule::in(['%', '₽', 'руб']),
            ],
            'cashback_amount' => [
                'nullable',
                'numeric',
                'min:0',
                Rule::requiredIf(fn () => in_array($this->input('promo_type_id'), [6, 7])),
            ],
            'cashback_currency' => [
                'nullable',
                'string',
                Rule::in(['%', '₽', 'руб']),
            ],
            'category_ids' => ['required', 'array', 'min:1'],
            'category_ids.*' => ['required', 'string', 'exists:categories,id'],
            'title' => ['required', 'string', 'max:64'],
            'description' => ['required', 'string'],
            'conditions' => ['nullable', 'string'],
            'minimum_order_amount' => ['nullable', 'numeric', 'min:0'],
            'promo_code' => ['nullable', 'string', 'max:255'],
            'free_delivery' => ['boolean'],
            'duration_days' => ['required', 'integer', 'min:1', 'max:30'],
            'show_in_banner' => ['boolean'],
            'addresses' => ['nullable', 'array'],
            'addresses.*.id' => ['nullable', 'integer', 'exists:addresses,id'],
            'addresses.*.address' => ['nullable', 'string', 'max:500'],
            'schedule' => ['nullable', 'array'],
            'schedule.enabled' => ['nullable', 'boolean'],
            'schedule.days' => ['nullable', 'array'],
            'schedule.days.*' => ['string', Rule::in(['md', 'tu', 'wd', 'th', 'fr', 'su', 'sn'])],
            'schedule.timeRange' => ['nullable', 'array'],
            'schedule.timeRange.enabled' => ['nullable', 'boolean'],
            'schedule.timeRange.start' => ['nullable', 'string', 'date_format:H:i'],
            'schedule.timeRange.end' => ['nullable', 'string', 'date_format:H:i'],
            'filter_city' => ['nullable', 'string'],
            'city_ids' => ['required', 'array', 'min:1'],
            'city_ids.*' => ['required', 'integer', 'exists:cities,id'],
            'youtube_url' => ['nullable', 'string', 'url', 'max:2083'],
            'social_links' => ['nullable', 'array'],
            'social_links.*' => ['nullable', 'array'],
            'social_links.*.*' => ['nullable', 'string', 'url', 'max:2083'],
            'photos' => ['nullable', 'array', 'max:10'],
            'photos.*' => ['nullable', 'string'],
            'agree_to_terms' => ['accepted'],
            'is_draft' => ['nullable', 'boolean'],
        ];
    }
}
