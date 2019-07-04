<?php

namespace App\Http\Controllers\Assisted\Asset;

use App\Forms\AssistedAsset\AssistedAssetForm;
use App\Http\Controllers\Controller;
use App\Models\Assisted;

class AssetCreate extends Controller
{
    /**
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Assisted $assisted)
    {
        $form = $this->formBuilder->create(AssistedAssetForm::class, [
            'url' => route('assisteds.assets.store', $assisted->id),
            'method' => 'POST'
        ]);

        return view('assisteds.assets.create', [
            'form' => $form
        ]);
    }
}
