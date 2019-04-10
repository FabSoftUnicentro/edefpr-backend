<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessSetWitness extends Controller
{
    /**
     * @param Request $request
     * @param Process $process
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Process $process)
    {
        try {
            $process->witnesses()->attach($request->witness_id);

            return redirect()
                ->route('processes.index')
                ->with('alert-success', 'Testemunha adicionada ao processo com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na adição da testemunha!');
        }
    }
}
