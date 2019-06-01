<?php

namespace App\Http\Controllers\AssistedAsset;

use App\Forms\AssistedAsset\AssistedAssetForm;
use App\Http\Controllers\Controller;
use App\Models\Assisted;

class AssistedAssetCreate extends Controller
{
    /**
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Assisted $assisted)
    {
        $form = $this->formBuilder->create(AssistedAssetForm::class, [
            'url' => route('assistedAssets.store', $assisted->id),
            'method' => 'POST'
        ]);

        return view('assistedAssets.create', [
            'form' => $form
        ]);
    }
}
