<?php

namespace App\Http\Controllers\Process;

use App\Forms\Process\ProcessForm;
use App\Http\Controllers\Controller;
use App\Models\Process;

class ProcessEdit extends Controller
{
    /**
     * @param Process $process
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Process $process)
    {
        $form = $this->formBuilder->create(ProcessForm::class, [
            'url' => route('processes.update', $process->id),
            'method' => 'PUT',
            'model' => $process
        ]);

        return view('processes.edit', [
            'form' => $form
        ]);
    }
}
