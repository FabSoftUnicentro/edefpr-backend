<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Http\Resources\Process as ProcessResource;
use App\Models\Witness;

class ProcessUnsetWitness extends Controller
{
    /**
     * @param Process $process
     * @param Witness $witness
     * @return ProcessResource
     */
    public function __invoke(Process $process, Witness $witness)
    {
        $process->witnesses()->detach($witness);

        return new ProcessResource($process);
    }
}
