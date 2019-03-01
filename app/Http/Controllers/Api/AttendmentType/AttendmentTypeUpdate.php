<?php

namespace App\Http\Controllers\Api\AttendmentType;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendmentType\UpdateRequest;
use App\Http\Resources\AttendmentType as AttendmentTypeResource;
use App\Models\AttendmentType;

class AttendmentTypeUpdate extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param AttendmentType $attendmentType
     * @return AttendmentTypeResource
     * @throws \Throwable
     */
    public function __invoke(UpdateRequest $request, AttendmentType $attendmentType)
    {
        $attendmentType->update($request->all());

        $attendmentType->saveOrFail();

        return new AttendmentTypeResource($attendmentType);
    }
}
