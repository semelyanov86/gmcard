<?php

declare(strict_types=1);

namespace App\Http\Controllers\Popup;

use App\Data\PopUpData;
use App\Http\Requests\Popup\PopUpFormRequest;
use App\Http\Controllers\Controller;
use App\Services\Popup\PopupFormService;

class FormSubmitController extends Controller
{
    public function __construct(protected PopupFormService $service) {}

    public function submit(PopUpFormRequest $request)
    {
        $dto = PopUpData::from($request);
        $crmResponse = $this->service->handle($dto);

        return redirect()->back()->with('success', 'Заявка отправлена!');
    }
}
