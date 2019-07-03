<?php

namespace App\Http\Controllers\Process;

use App\Forms\MyFiles\MyFilesForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Process;

class ProcessListPetition extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Process $process
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Process $process)
    {
        $files = $process->media()->where('collection_name', 'petition')->get();

        $form = $this->formBuilder->create(MyFilesForm::class, [
            'url' => route('processes.petitionUpload', $process->id),
            'method' => 'POST'
        ]);

        return view('processes.petition', [
            'form' => $form,
            'process' => $process,
            'files' => $files
        ]);
    }
}
