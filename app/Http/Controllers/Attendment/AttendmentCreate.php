<?php

namespace App\Http\Controllers\Attendment;

use App\Forms\Attendment\AttendmentForm;
use App\Http\Controllers\Controller;

class AttendmentCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(AttendmentForm::class, [
            'url' => route('attendments.store'),
            'method' => 'POST'
        ]);
        
        return view('attendments.create', [
            'form' => $form,
        ]);
    }
}