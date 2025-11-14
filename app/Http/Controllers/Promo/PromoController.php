<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Http\Controllers\Controller;
use App\Models\Promo;
use Illuminate\Http\RedirectResponse;

class PromoController extends Controller
{
    public function destroy(Promo $promo): RedirectResponse
    {
        $user = auth()->user();

        abort_if(! $user || $promo->user_id !== $user->id, 403);

        $promo->delete();

        return redirect()
            ->back()
            ->with('success', 'Акция удалена');
    }


}

