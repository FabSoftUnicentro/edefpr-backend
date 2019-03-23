<?php

namespace App\Http\Controllers\FamilyComposition;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberUpdate extends Controller
{
    /**
     * @param Request $request
     * @param FamilyMember $familyComposition
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, FamilyMember $familyComposition)
    {
        $familyComposition->update($request->all());

        try {
            $familyComposition->save();

            return redirect()
                ->route('familyCompositions.index')
                ->with('alert-success', 'Composição familiar atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização da Composição familiar!');
        }
    }
}
