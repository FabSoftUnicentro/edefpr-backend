<?php

namespace App\Http\Controllers\Process;

use App\Forms\Process\ProcessForm;
use App\Http\Controllers\Controller;

class ProcessCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(ProcessForm::class, [
            'url' => route('processes.store'),
            'method' => 'POST'
        ]);

        return view('processes.create', [
            'form' => $form
        ]);
    }
}
