<?php

namespace App\Http\Controllers\Witness;

use App\Http\Controllers\Controller;
use App\Models\Witness;
use Illuminate\Http\Request;

class WitnessUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Witness $witness
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Witness $witness)
    {
        $witness->update($request->all());

        try {
            $witness->save();

            return redirect()
                ->route('witnesses.index')
                ->with('alert-success', 'Testemunha atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização da testemunha!');
        }
    }
}
