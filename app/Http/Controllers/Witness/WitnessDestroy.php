<?php

namespace App\Http\Controllers\Witness;

use App\Http\Controllers\Controller;
use App\Http\Resources\Witness as WitnessResource;
use App\Models\Witness;

class WitnessDestroy extends Controller
{
    /**
     * @param Witness $witness
     * @return WitnessResource
     * @throws \Exception
     */
    public function __invoke(Witness $witness)
    {
        $witness->delete();

        return new WitnessResource($witness);
    }
}
