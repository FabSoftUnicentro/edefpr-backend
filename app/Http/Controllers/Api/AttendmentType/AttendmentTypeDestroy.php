<?php

namespace App\Http\Controllers\Api\AttendmentType;

use App\Http\Controllers\Controller;
use App\Http\Resources\Attendment as AttendmentResource;
use App\Models\AttendmentType;

class AttendmentTypeDestroy extends Controller
{
    /**
     * @param AttendmentType $attendmentType
     * @return AttendmentResource
     * @throws \Exception
     */
    public function __invoke(AttendmentType $attendmentType)
    {
        $attendmentType->delete();

        return new AttendmentResource($attendmentType);
    }
}
