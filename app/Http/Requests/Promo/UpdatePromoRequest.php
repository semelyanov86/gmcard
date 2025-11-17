<?php

declare(strict_types=1);

namespace App\Http\Requests\Promo;

use App\Models\Promo;
use Override;

class UpdatePromoRequest extends CreatePromoRequest
{
    #[Override]
    public function authorize(): bool
    {
        /** @var Promo|null $promo */
        $promo = $this->route('promo');

        return $promo !== null
            && $this->user() !== null
            && $promo->user_id === $this->user()->id;
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
