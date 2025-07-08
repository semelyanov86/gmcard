<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings\GeneralSettings;
use Inertia\Inertia;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $settings = app(GeneralSettings::class);

        return Inertia::render('settings/GeneralSettings', [
            'email' => $settings->email,
            'phone' => $settings->phone,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $settings = app(GeneralSettings::class);
        $settings->email = $data['email'];
        $settings->phone = $data['phone'];
        $settings->save();

        return redirect()->back()->with('success', 'Настройки обновлены');
    }
}
