<?php

namespace App\Http\Controllers\AttendmentType;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendmentType as AttendmentTypeResource;
use App\Models\AttendmentType;

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
