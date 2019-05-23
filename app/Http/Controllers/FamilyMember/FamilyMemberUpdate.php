<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Http\Requests\FamilyMember\UpdateRequest;
use App\Models\FamilyMember;

class FamilyMemberUpdate extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param FamilyMember $familyMember
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdateRequest $request, FamilyMember $familyMember)
    {
        $familyMember->update($request->all());

        try {
            $familyMember->save();

            return redirect()
                ->route('familyMembers.show', $familyMember->id)
                ->with('alert-success', 'Membro familiar atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do membro familiar!');
        }
    }
}
