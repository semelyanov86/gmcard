<?php

declare(strict_types=1);

namespace App\Http\Requests\Promo;

use Illuminate\Support\Facades\Auth;
use Override;

class UpdatePromoRequest extends CreatePromoRequest
{
    #[Override]
    public function authorize(): bool
    {
        return Auth::check();
    }

    #[Override]
    /**
     * @return ValidationRules
     */
    public function rules(): array
    {
        $rules = parent::rules();
        unset($rules['agree_to_terms']);

        $rules['existing_photo'] = ['nullable', 'string', 'max:255'];

        return $rules;
    }
}
