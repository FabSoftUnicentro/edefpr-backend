<?php

namespace App\Http\Controllers\AssistedAsset;

use App\Forms\AssistedAsset\AssistedAssetForm;
use App\Http\Controllers\Controller;
use App\Models\AssistedAsset;

class AssistedAssetEdit extends Controller
{
    /**
     * @param AssistedAsset $assistedAsset
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(AssistedAsset $assistedAsset)
    {
        $assistedAsset->price = money($assistedAsset->price);
        $assistedAsset->installment_price = money($assistedAsset->installment_price);

        $form = $this->formBuilder->create(AssistedAssetForm::class, [
            'url' => route('assistedAssets.update', $assistedAsset->id),
            'method' => 'PUT',
            'model' => $assistedAsset
        ]);

        return view('assistedAssets.edit', [
            'form' => $form
        ]);
    }
}
