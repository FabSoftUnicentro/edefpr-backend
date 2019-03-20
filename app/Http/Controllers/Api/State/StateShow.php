<?php

namespace App\Http\Controllers\Api\State;

use App\Http\Controllers\Controller;
use App\Http\Resources\State as StateResource;
use App\Models\State;

class StateShow extends Controller
{
    /**
     * @param State $state
     * @return StateResource
     */
    public function __invoke(State $state)
    {
        return new StateResource($state);
    }
}
