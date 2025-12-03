<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tariff;

use App\Http\Controllers\Controller;
use App\Models\TariffPlan;
use App\Settings\GeneralSettings;
use Inertia\Inertia;
use Inertia\Response;

class TariffPlansController extends Controller
{
    public function index(GeneralSettings $settings): Response
    {
        $tariffPlans = TariffPlan::with('features')->get();

        return Inertia::render('TarifPlans', [
            'contact' => [
                'email' => $settings->email,
                'phone' => $settings->phone,
            ],
            'serviceStatusBlocks' => config('tariff.status_blocks'),
            'tariffPlans' => $tariffPlans,
        ]);
    }
}
