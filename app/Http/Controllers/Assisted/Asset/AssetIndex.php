<?php

namespace App\Http\Controllers\Assisted\Asset;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use Illuminate\Http\Request;

class AssetIndex extends Controller
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

        $assistedAssets = $assisted->assets()->paginate($perPage);

        return view('assisteds.assets.index', [
            'assistedAssets' => $assistedAssets,
            'assisted' => $assisted
        ]);
    }
}
