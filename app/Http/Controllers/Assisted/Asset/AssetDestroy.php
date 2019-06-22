<?php

namespace App\Http\Controllers\Assisted\Asset;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssistedAsset as AssistedAssetResource;
use App\Models\Asset;
use App\Models\Assisted;

class AssetDestroy extends Controller
{
    /**
     * @param Assisted $assisted
     * @param Asset $asset
     * @return AssistedAssetResource
     * @throws \Exception
     */
    public function __invoke(Assisted $assisted, Asset $asset)
    {
        $asset->delete();

        return new AssistedAssetResource($asset);
    }
}
