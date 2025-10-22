<?php

declare(strict_types=1);

namespace App\Http\Requests\Promo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePromoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'promo_type_id' => ['required', 'integer', Rule::in([1, 2, 3, 4, 5, 6, 7])],
            'title' => ['required', 'string', 'max:64'],
            'description' => ['required', 'string'],
            'conditions' => ['nullable', 'string'],
            'discount_amount' => ['nullable', 'string', 'max:10'],
            'discount_currency' => ['nullable', 'string', 'in:%,₽'],
            'cashback_amount' => ['nullable', 'string', 'max:10'],
            'cashback_currency' => ['nullable', 'string', 'in:%,₽'],
            'minimum_order_amount' => ['nullable', 'string', 'max:10'],
            'promo_code' => ['nullable', 'string', 'max:50'],
            'category_ids' => ['required', 'array', 'min:1'],
            'category_ids.*' => ['required', 'string'],
            'city_ids' => ['nullable', 'array'],
            'city_ids.*' => ['integer', 'exists:cities,id'],
            'duration_days' => ['required', 'integer', 'min:0', 'max:30'],
            'show_in_banner' => ['boolean'],
            'free_delivery' => ['boolean'],
            'youtube_url' => ['nullable', 'string', 'url', 'max:2083'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['file', 'image', 'max:5120'], // 5MB
            'social_links' => ['nullable', 'array'],
            'schedule' => ['nullable', 'array'],
            'schedule.enabled' => ['boolean'],
            'schedule.days' => ['nullable', 'array'],
            'schedule.timeRange' => ['nullable', 'array'],
            'schedule.timeRange.enabled' => ['boolean'],
            'schedule.timeRange.start' => ['nullable', 'string'],
            'schedule.timeRange.end' => ['nullable', 'string'],
            'addresses' => ['nullable', 'array'],
            'is_draft' => ['nullable', 'boolean'],
            'agree_to_terms' => ['required', 'accepted'],
        ];
    }
}
