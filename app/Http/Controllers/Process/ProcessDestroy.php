<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Http\Resources\Process as ProcessResource;
use App\Models\Process;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;

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

        LogActivityUtil::register(Auth::user(), "Processo $process->title arquivado");

        return new ProcessResource($process);
    }
}
