<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use Illuminate\Http\Request;

class AssistedUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Assisted $assisted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Assisted $assisted)
    {
        $assisted->update($request->all());

        try {
            $assisted->save();

            return redirect()
                ->route('assisteds.index')
                ->with('alert-success', 'Assistido atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do assistido!');
        }
    }
}
