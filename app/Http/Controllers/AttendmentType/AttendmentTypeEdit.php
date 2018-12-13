<?php

namespace App\Http\Controllers\AttendmentType;

use App\Forms\AttendmentType\AttendmentTypeForm;
use App\Http\Controllers\Controller;
use App\Models\AttendmentType;

class AttendmentTypeEdit extends Controller
{
    /**
     * @param AttendmentType $attendmentType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(AttendmentType $attendmentType)
    {
        $form = $this->formBuilder->create(AttendmentTypeForm::class, [
            'url' => route('attendmentTypes.update', $attendmentType->id),
            'method' => 'PUT',
            'model' => $attendmentType
        ]);

        return view('attendmentTypes.edit', [
            'form' => $form
        ]);
    }
}
