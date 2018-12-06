<?php

namespace App\Http\Controllers\AttendmentType;

use App\Forms\AttendmentType\AttendmentTypeForm;
use App\Http\Controllers\Controller;

class AttendmentTypeCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(AttendmentTypeForm::class, [
            'url' => route('attendmentTypes.store'),
            'method' => 'POST'
        ]);

        return view('attendmentTypes.create', [
            'form' => $form
        ]);
    }
}
