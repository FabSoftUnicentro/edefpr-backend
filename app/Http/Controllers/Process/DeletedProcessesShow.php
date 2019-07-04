<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;

class DeletedProcessesShow extends Controller
{
    /**
     * @param Process $process
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke($process)
    {
        $process = Process::withTrashed()->find($process);

        return view('processes.deleted.show', [
            'process' => $process
        ]);
    }
}
