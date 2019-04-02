<?php

namespace App\Http\Controllers\CounterPart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounterPart as CounterPartResource;
use App\Models\CounterPart;

class CounterPartDestroy extends Controller
{
    /**
     * @param CounterPart $counterPart
     * @return CounterPartResource
     */
    public function __invoke(CounterPart $counterPart)
    {
        $counterPart->delete();

        return new CounterPartResource($counterPart);
    }
}
