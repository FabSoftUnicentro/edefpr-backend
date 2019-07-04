<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Http\Resources\Process as ProcessResource;
use App\Models\Process;
use App\Models\Witness;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;

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

        LogActivityUtil::register(Auth::user(), "Testemunhas do processo $process->title atualizadas");

        return new ProcessResource($process);
    }
}
