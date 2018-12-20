<?php

namespace App\Http\Controllers\AttendmentType;

use App\Http\Controllers\Controller;
use App\Models\AttendmentType;

class AttendmentTypeShow extends Controller
{
    /**
     * @param AttendmentType $attendmentType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(AttendmentType $attendmentType)
    {
        return view('attendmentTypes.show', [
            'attendmentType' => $attendmentType
        ]);
    }
}
