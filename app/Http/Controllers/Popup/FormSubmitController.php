<?php

declare(strict_types=1);

namespace App\Http\Controllers\Popup;

use App\Actions\Popup\PopupFormAction;
use App\Data\PopUpData;
use App\Http\Requests\Popup\PopUpFormRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class FormSubmitController extends Controller
{
    public function __construct(protected PopupFormAction $service) {}

    public function submit(PopUpFormRequest $request): RedirectResponse
    {
        $dto = PopUpData::from($request);
        $this->service->handle($dto);

        return redirect()->back()->with('success', 'Заявка отправлена!');
    }
}
