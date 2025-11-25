<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Actions\Promo\ApprovePromoAction;
use App\Actions\Promo\RejectPromoAction;
use App\Data\ApprovePromoData;
use App\Data\RejectPromoData;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promo\ApprovePromoRequest;
use App\Http\Requests\Promo\RejectPromoRequest;
use App\Models\Promo;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ModerationController extends Controller
{
    public function rejectForm(Promo $promo)
    {
        return inertia()->modal('Modals/RejectPromoModal', [
            'promoId' => $promo->id,
        ])->baseRoute('profile');
    }

    public function approve(Promo $promo, ApprovePromoRequest $request): RedirectResponse
    {
        $user = auth()->user();
        assert($user !== null);

        ApprovePromoAction::run(ApprovePromoData::from([
            'promoId' => $promo->id,
            'moderatorId' => $user->id,
            'message' => $request->validated()['message'] ?? null,
        ]));

        return redirect()
            ->back()
            ->with('success', 'Акция одобрена');
    }

    public function reject(Promo $promo, RejectPromoRequest $request): RedirectResponse
    {
        $user = auth()->user();
        assert($user !== null);

        RejectPromoAction::run(RejectPromoData::from([
            'promoId' => $promo->id,
            'moderatorId' => $user->id,
            'rejectionReason' => $request->validated()['rejection_reason'],
            'message' => $request->validated()['message'] ?? null,
        ]));

        return redirect()
            ->route('profile')
            ->with('success', 'Акция отклонена');
    }
}
