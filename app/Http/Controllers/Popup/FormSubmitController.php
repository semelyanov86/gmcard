<?php

namespace App\Http\Controllers\Popup;

use App\Http\Requests\Popup\PopUpFormRequest;
use App\Http\Controllers\Controller;

class FormSubmitController extends Controller
{
    public function submit(PopUpFormRequest $request)
    {
        $data = $request->validated();
        dd($data);
        return redirect()->back();
    }
}
