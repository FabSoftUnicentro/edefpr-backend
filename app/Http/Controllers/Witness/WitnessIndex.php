<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use Illuminate\Http\Request;

class AssistedIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $assisteds = Assisted::paginate($perPage);

        return view('assisteds.index', [
            'assisteds' => $assisteds
        ]);
    }
}
