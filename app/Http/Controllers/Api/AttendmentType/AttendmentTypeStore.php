<?php

namespace App\Http\Controllers\Api\AttendmentType;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttendmentType\StoreRequest;
use App\Http\Resources\AttendmentType as AttendmentTypeResource;
use App\Models\AttendmentType;

class AttendmentTypeStore extends Controller
{
    /**
     * @param StoreRequest $request
     * @return AttendmentTypeResource
     * @throws \Throwable
     */
    public function __invoke(StoreRequest $request)
    {
        $attendmentType = new AttendmentType($request->all());

        $attendmentType->saveOrFail();

        return new AttendmentTypeResource($attendmentType);
    }
}
