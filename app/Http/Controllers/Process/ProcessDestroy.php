<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Http\Resources\Process as ProcessResource;
use App\Models\Process;

class ProcessDestroy extends Controller
{
    /**
     * @param Process $process
     * @return ProcessResource
     * @throws \Exception
     */
    public function __invoke(Process $process)
    {
        $process->delete();

        return new ProcessResource($process);
    }
}
