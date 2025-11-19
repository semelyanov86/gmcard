<?php

declare(strict_types=1);

namespace App\Http\Controllers\Promo;

use App\Actions\Promo\ApprovePromoAction;
use App\Actions\Promo\RejectPromoAction;
use App\Data\ApprovePromoData;
use App\Data\RejectPromoData;
use App\Enums\Promo\PromoModerationStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Promo\ApprovePromoRequest;
use App\Http\Requests\Promo\RejectPromoRequest;
use App\Models\Promo;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ModerationController extends Controller
{
    public function index(): Response
    {
        $pendingPromos = Promo::where('moderation_status', PromoModerationStatus::PENDING->value)
            ->with(['user', 'promoType'])
            ->latest()
            ->get();

        return Inertia::render('Moderation/ModerationPromos', [
            'pendingPromos' => $pendingPromos,
        ]);
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
            ->back()
            ->with('success', 'Акция отклонена');
    }
}
