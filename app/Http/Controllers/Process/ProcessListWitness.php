<?php

namespace App\Http\Controllers\Process;

use App\Forms\Process\ProcessWitnessForm;
use App\Http\Controllers\Controller;
use App\Models\Process;

class ProcessListWitness extends Controller
{
    /**
     * @param Process $process
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Process $process)
    {
        $form = $this->formBuilder->create(ProcessWitnessForm::class, [
            'url' => route('processes.setWitness', $process->id),
            'method' => 'PUT',
            'model' => $process
        ]);

        return view('processes.witness', [
            'form' => $form
        ]);
    }
}
