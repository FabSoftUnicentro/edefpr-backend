<?php

namespace App\Http\Controllers\AttendmentType;

use App\Http\Controllers\Controller;
use App\Http\Resources\AttendmentType as AttendmentTypeResource;
use App\Models\AttendmentType;

class AttendmentTypeList extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $attendmentTypes = AttendmentType::paginate($this->itemsPerPage);

        return AttendmentTypeResource::collection($attendmentTypes);
    }
}
