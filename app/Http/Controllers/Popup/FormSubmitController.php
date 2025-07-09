<?php

namespace App\Http\Controllers\Popup;

use App\Http\Requests\Popup\PopUpFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormSubmitController extends Controller
{
    public function submit(PopUpFormRequest $request)
    {
        $data = $request->validated();

        return response()->json(['message' => 'Форма успешно отправлена!']);
    }
}
