<?php

namespace App\Http\Controllers\AssistedAsset;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use Illuminate\Http\Request;

class AssistedAssetIndex extends Controller
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

        $assistedAssets = $assisted->assistedAssets()->paginate($perPage);

        return view('assistedAssets.index', [
            'assistedAssets' => $assistedAssets,
            'assisted' => $assisted
        ]);
    }
}
