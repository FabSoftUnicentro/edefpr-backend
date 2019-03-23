<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberUpdate extends Controller
{
    /**
     * @param Request $request
     * @param FamilyMember $familyMember
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, FamilyMember $familyMember)
    {
        $familyMember->update($request->all());

        try {
            $familyMember->save();

            return redirect()
                ->route('familyMembers.index')
                ->with('alert-success', 'Membro familiar atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do membro familiar!');
        }
    }
}
