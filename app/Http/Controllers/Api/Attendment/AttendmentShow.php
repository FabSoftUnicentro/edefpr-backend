<?php

namespace App\Http\Controllers\Api\Attendment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Attendment as AttendmentResource;
use App\Models\Attendment;

class AttendmentShow extends Controller
{
    /**
     * @param Attendment $attendment
     * @return AttendmentResource
     */
    public function __invoke(Attendment $attendment)
    {
        return new AttendmentResource($attendment);
    }
}
