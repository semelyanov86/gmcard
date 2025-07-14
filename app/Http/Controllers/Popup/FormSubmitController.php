<?php

namespace App\Http\Controllers\Popup;

use App\Data\PopUpData;
use App\Http\Requests\Popup\PopUpFormRequest;
use App\Http\Controllers\Controller;

class FormSubmitController extends Controller
{
    public function submit(PopUpFormRequest $request)
    {
        $dto = PopUpData::from($request);
        return redirect()->back()->with('success', 'Форма успешно отправлена!');
    }
}
