<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $familyMember = new FamilyMember($request->all());

        try {
            $familyMember->save();

            return redirect()
                ->route('familyMembers.index')
                ->with('alert-success', 'Membro familiar cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro do membro familiar!' . $e->getMessage());
        }
    }
}
