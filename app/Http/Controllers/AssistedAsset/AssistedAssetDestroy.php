<?php

namespace App\Http\Controllers\AssistedAsset;

use App\Http\Controllers\Controller;
use App\Http\Resources\AssistedAsset as AssistedAssetResource;
use App\Models\AssistedAsset;

class AssistedAssetDestroy extends Controller
{
    /**
     * @param AssistedAsset $assistedAsset
     * @return AssistedAssetResource
     * @throws \Exception
     */
    public function __invoke(AssistedAsset $assistedAsset)
    {
        $assistedAsset->delete();

        return new AssistedAssetResource($assistedAsset);
    }
}
