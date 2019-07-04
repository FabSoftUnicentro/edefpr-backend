<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class ProcessSetPetition extends Controller
{
    private $path = 'files/myfiles/';

    /**
     * @param Request $request
     * @param Process $process
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Process $process)
    {
        $path = storage_path($this->path);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $files = $request->file('files');

        foreach ($files as $file) {
            $name = str_replace(" ", "_", $file->getClientOriginalName());
            $file->move($path, $name);

            $process
                ->addMedia(storage_path($this->path . $name))
                ->toMediaCollection('petition');
        }

        LogActivityUtil::register($request->user(), "Realizou o upload de uma petição ao processo $process->title");

        try {
            return redirect()
                ->route('processes.petition', $process->id)
                ->with('alert-success', 'Arquivo salvo com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao salvar arquivo!');
        }
    }
}
