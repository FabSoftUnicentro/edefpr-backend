<?php

namespace App\Http\Controllers\AttendmentType;

use App\Http\Controllers\Controller;
use App\Models\AttendmentType;
use App\Http\Resources\AttendmentType as AttendmentTypeResource;

class AttendmentTypeDestroy extends Controller
{
    /**
     * @param AttendmentType $attendmentType
     * @return AttendmentTypeResource
     */
    public function __invoke(AttendmentType $attendmentType)
    {
        $attendmentType->delete();

        return new AttendmentTypeResource($attendmentType);
    }
}
