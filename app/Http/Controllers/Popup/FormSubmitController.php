<?php

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
        $data = PopUpData::from($request);
        $crmResponse = $this->service->handle($data);

        return response()->json(['success' => true, 'crm' => $crmResponse]);
    }
}
