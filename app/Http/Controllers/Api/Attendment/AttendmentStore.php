<?php

namespace App\Http\Controllers\Api\Attendment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attendment\StoreRequest;
use App\Http\Resources\Attendment as AttendmentResource;
use App\Models\Attendment;

class AttendmentStore extends Controller
{
    /**
     * @param StoreRequest $request
     * @return AttendmentResource
     * @throws \Throwable
     */
    public function __invoke(StoreRequest $request)
    {
        $attendment = new Attendment($request->all());

        $attendment->saveOrFail();

        return new AttendmentResource($attendment);
    }
}
