<?php

namespace App\Http\Controllers\Attendment;

use App\Http\Controllers\Controller;
use App\Models\Attendment;
use App\Http\Resources\Attendment as AttendmentResource;

class AttendmentDestroy extends Controller
{
    /**
     * @param Attendment $attendment
     * @return AttendmentResource
     */
    public function __invoke(Attendment $attendment)
    {
        $attendment->delete();

        return new AttendmentResource($attendment);
    }
}
