<?php

declare(strict_types=1);

namespace App\Http\Requests\Promo;

use Illuminate\Foundation\Http\FormRequest;

class ApprovePromoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'message' => ['nullable', 'string', 'max:500'],
        ];
    }
}
