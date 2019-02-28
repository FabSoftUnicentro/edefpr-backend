<?php

namespace App\Http\Controllers\Api\CounterPart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounterPart as CounterPartResource;
use App\Models\CounterPart;

class CounterPartList extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $counterPart = CounterPart::paginate($this->itemsPerPage);

        return CounterPartResource::collection($counterPart);
    }
}
