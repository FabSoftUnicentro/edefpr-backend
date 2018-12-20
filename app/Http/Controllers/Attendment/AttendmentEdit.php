<?php

namespace App\Http\Controllers\Attendment;

use App\Forms\Attendment\AttendmentForm;
use App\Http\Controllers\Controller;
use App\Models\Attendment;

class AttendmentEdit extends Controller
{
    /**
     * @param Attendment $attendment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Attendment $attendment)
    {
        $form = $this->formBuilder->create(AttendmentForm::class, [
            'url' => route('attendments.update', $attendment->id),
            'method' => 'PUT',
            'model' => $attendment
        ]);

        return view('attendments.edit', [
            'form' => $form
        ]);
    }
}
