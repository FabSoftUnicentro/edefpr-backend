<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Models\FamilyComposition;
use Illuminate\Http\Request;

class FamilyCompositionStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $familyComposition = new FamilyComposition($request->all());

        try {
            $familyComposition->save();

            return redirect()
                ->route('familyCompositions.index')
                ->with('alert-success', 'Composição familiar cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro da composição familiar!' . $e->getMessage());
        }
    }
}
