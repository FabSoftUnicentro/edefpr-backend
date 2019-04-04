<?php

namespace App\Http\Controllers\Witness;

use App\Http\Controllers\Controller;
use App\Models\Witness;
use Illuminate\Http\Request;

class WitnessIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $witnesses = Witness::paginate($perPage);

        return view('witnesses.index', [
            'witnesses' => $witnesses
        ]);
    }
}
