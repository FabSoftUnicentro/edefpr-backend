<?php

namespace App\Http\Controllers\Api\AttendmentType;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendmentType as AttendmentTypeResource;
use App\Models\AttendmentType;

class AttendmentTypeShow extends Controller
{
    /**
     * @param AttendmentType $attendment
     * @return AttendmentTypeResource
     */
    public function __invoke(AttendmentType $attendmentType)
    {
        return new AttendmentTypeResource($attendmentType);
    }
}
