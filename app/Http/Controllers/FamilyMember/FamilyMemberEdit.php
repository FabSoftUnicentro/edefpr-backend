<?php

namespace App\Http\Controllers\FamilyMember;

use App\Forms\FamilyMember\FamilyMemberForm;
use App\Http\Controllers\Controller;
use App\Models\FamilyMember;

class FamilyMemberEdit extends Controller
{
    /**
     * @param FamilyMember $familyMember
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(FamilyMember $familyMember)
    {
        $familyMember->income = money($familyMember->income);

        $form = $this->formBuilder->create(FamilyMemberForm::class, [
            'url' => route('familyMembers.update', $familyMember->id),
            'method' => 'PUT',
            'model' => $familyMember
        ]);

        return view('familyMembers.edit', [
            'form' => $form
        ]);
    }
}
