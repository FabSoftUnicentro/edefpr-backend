<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;

class ProcessShow extends Controller
{
    /**
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Process $process)
    {
        return view('processes.show', [
            'process' => $process
        ]);
    }
}
