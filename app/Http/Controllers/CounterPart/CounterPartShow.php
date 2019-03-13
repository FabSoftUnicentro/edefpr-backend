<?php

namespace App\Http\Controllers\CounterPart;

use App\Models\CounterPart;
use App\Http\Resources\CounterPart as CounterPartResource;
use App\Http\Controllers\Controller;

class CounterPartShow extends Controller
{
    /**
     * @param CounterPart $counterPart
     * @return CounterPartResource
     */
    public function __invoke(CounterPart $counterPart)
    {
        return view('counterParts.show', [
            'counterPart' => $counterPart
        ]);
    }
}
