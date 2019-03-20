<?php

namespace App\Http\Controllers\Attendment;

use App\Http\Controllers\Controller;
use App\Http\Resources\Attendment as AttendmentResource;
use App\Models\Attendment;

class AttendmentList extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $attendment = Attendment::paginate($this->itemsPerPage);

        return AttendmentResource::collection($attendment);
    }
}
