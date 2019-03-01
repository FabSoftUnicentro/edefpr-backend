<?php

namespace App\Http\Controllers\Api\CounterPart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounterPart as CounterPartResource;
use App\Models\CounterPart;

class CounterPartShow extends Controller
{
    /**
     * @param CounterPart $counterPart
     * @return CounterPartResource
     */
    public function __invoke(CounterPart $counterPart)
    {
        return new CounterPartResource($counterPart);
    }
}
