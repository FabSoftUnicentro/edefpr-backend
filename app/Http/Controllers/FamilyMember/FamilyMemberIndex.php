<?php

namespace App\Http\Controllers\FamilyMember;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use Illuminate\Http\Request;

class FamilyMemberIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request, Assisted $assisted)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $familyMembers = $assisted->familyMembers()->with('assisted')->paginate($perPage);

        return view('familyMembers.index', [
            'familyMembers' => $familyMembers,
            'assisted' => $assisted
        ]);
    }
}
