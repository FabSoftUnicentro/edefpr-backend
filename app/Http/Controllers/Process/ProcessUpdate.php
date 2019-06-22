<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;

class ProcessUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Process $process
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Process $process)
    {
        $process->update($request->all());

        try {
            if ($process->assisted->getAssetsPrice() > 150000) {
                throw new \InvalidArgumentException('A soma dos bens do assistido excede 1500 UFP/PR');
            }
            $process->save();

            return redirect()
                ->route('processes.index')
                ->with('alert-success', 'Processo atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->with('alert-danger', 'Falha na atualização do processo! ' . $e->getMessage());
        }
    }
}
