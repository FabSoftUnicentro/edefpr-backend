<?php

namespace App\Http\Controllers\CounterPart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounterPart as CounterPartListResource;
use App\Models\CounterPart;
use Illuminate\Http\Request;

class CounterPartList extends Controller
{
    /** @var int */
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke(Request $request)
    {
        $counterPartList = CounterPart::paginate($this->itemsPerPage);

        return CounterPartListResource::collection($counterPartList);
    }
}
