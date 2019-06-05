<?php

namespace App\Http\Controllers\Assisted\Asset;

use App\Forms\AssistedAsset\AssistedAssetForm;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Assisted;

class AssetEdit extends Controller
{
    /**
     * @param Assisted $assisted
     * @param Asset $asset
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Assisted $assisted, Asset $asset)
    {
        $asset->price = money($asset->price);
        $asset->installment_price = money($asset->installment_price);

        $form = $this->formBuilder->create(AssistedAssetForm::class, [
            'url' => route('assisteds.asset.update', [$assisted->id, $asset->id]),
            'method' => 'PUT',
            'model' => $asset
        ]);

        return view('assisteds.assets.edit', [
            'form' => $form
        ]);
    }
}
