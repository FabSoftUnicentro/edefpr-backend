<?php

namespace App\Http\Controllers\AttendmentType;

use App\Http\Controllers\Controller;
use App\Models\AttendmentType;
use Illuminate\Http\Request;

class AttendmentTypeIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $attendmentTypes = AttendmentType::paginate($perPage);

        return view('attendmentTypes.index', [
            'attendmentTypes' => $attendmentTypes
        ]);
    }
}
