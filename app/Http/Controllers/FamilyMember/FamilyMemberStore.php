<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Http\Requests\FamilyMember\StoreRequest;
use App\Models\Assisted;
use App\Models\FamilyMember;

class FamilyMemberStore extends Controller
{
    /**
     * @param StoreRequest $request
     * @param Assisted $assisted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(StoreRequest $request, Assisted $assisted)
    {
        $familyMember = new FamilyMember($request->all());
        $familyMember->assisted_id = $assisted->id;
        if ($familyMember->income === "") {
            $familyMember->income = 0.00;
        }

        try {
            $familyMember->save();

            return redirect()
                ->route('familyMembers.index', $assisted->id)
                ->with('alert-success', 'Membro familiar cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro do membro familiar!' . $e->getMessage());
        }
    }
}
