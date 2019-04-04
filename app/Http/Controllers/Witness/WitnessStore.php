<?php

namespace App\Http\Controllers\Witness;

use App\Http\Controllers\Controller;
use App\Models\Witness;
use Illuminate\Http\Request;

class WitnessStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $witness = new Witness($request->all());

        try {
            $witness->save();

            return redirect()
                ->route('witnesses.index')
                ->with('alert-success', 'Testemunha cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro da testemunha!' . $e->getMessage());
        }
    }
}
