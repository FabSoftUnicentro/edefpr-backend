<?php

namespace App\Http\Controllers\FamilyMember;

use App\Forms\FamilyMember\FamilyMemberForm;
use App\Http\Controllers\Controller;
use App\Models\Assisted;

class FamilyMemberCreate extends Controller
{
    /**
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Assisted $assisted)
    {
        $form = $this->formBuilder->create(FamilyMemberForm::class, [
            'url' => route('familyMembers.store', $assisted->id),
            'method' => 'POST'
        ]);

        return view('familyMembers.create', [
            'form' => $form
        ]);
    }
}
