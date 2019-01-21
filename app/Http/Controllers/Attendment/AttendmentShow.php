<?php

namespace App\Http\Controllers\Attendment;

use App\Http\Controllers\Controller;
use App\Models\Attendment;

class AttendmentShow extends Controller
{
    /**
     * @param Attendment $attendment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Attendment $attendment)
    {
        return view('attendments.show', [
            'attendment' => $attendment
        ]);
    }
}
