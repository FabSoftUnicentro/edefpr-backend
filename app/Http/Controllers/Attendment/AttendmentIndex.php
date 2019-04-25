<?php

namespace App\Http\Controllers\Attendment;

use App\Http\Controllers\Controller;
use App\Models\Attendment;
use Illuminate\Http\Request;

class AttendmentIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $result = Attendment::with([
            'user',
            'assisted',
            'type'
        ])->paginate($perPage);

        return view('attendments.index', [
            'attendments' => $result
        ]);
    }
}
