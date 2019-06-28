<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;

class DeletedProcessShow extends Controller
{
    /**
     * @param Process $process
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke($process)
    {
        $process = Process::withTrashed()->find($process);

        return view('processes.deletedShow', [
            'process' => $process
        ]);
    }
}
