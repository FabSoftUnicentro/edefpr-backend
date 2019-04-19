<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use App\Models\Witness;
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
            $witnesses = Witness::findOrFail($request->witnesses);
            $processWitnesses = $process->witnesses()->count();

            foreach ($witnesses as $witness) {
                if ($process->witnesses->contains($witness->id) || count($witnesses) + $processWitnesses > Process::MAX_WITNESSES) {
                    throw new \InvalidArgumentException();
                } else {
                    $process->witnesses()->attach($witness);
                }
            }

            return redirect()
                ->route('processes.show', $process->id)
                ->with('alert-success', 'Testemunhas adicionadas ao processo com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na adição das testemunhas!');
        }
    }
}
