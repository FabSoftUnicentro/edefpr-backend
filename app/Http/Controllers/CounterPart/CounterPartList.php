<?php

namespace App\Http\Controllers\CounterPart;

use App\Models\CounterPart;
use App\Http\Resources\CounterPart as CounterPartListResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $paginate = intval($request->get('paginate', 1));

        if ($paginate === 1) {
            $counterPartList = CounterPart::orderBy('name', 'asc')->paginate($this->itemsPerPage);
        } else {
            $counterPartList = CounterPart::orderBy('name', 'asc')->get();
        }

        return CounterPartListResource::collection($counterPartList);
    }
}
