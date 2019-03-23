<?php

namespace App\Http\Controllers\FamilyMember;

use App\Forms\FamilyMember\FamilyMemberForm;
use App\Http\Controllers\Controller;

class FamilyMemberCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(FamilyMemberForm::class, [
            'url' => route('familyMembers.store'),
            'method' => 'POST'
        ]);

        return view('familyMembers.create', [
            'form' => $form
        ]);
    }
}
