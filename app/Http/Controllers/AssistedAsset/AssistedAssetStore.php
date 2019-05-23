<?php

namespace App\Http\Controllers\AssistedAsset;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssistedAsset\StoreRequest;
use App\Models\Assisted;
use App\Models\AssistedAsset;

class AssistedAssetStore extends Controller
{
    /**
     * @param StoreRequest $request
     * @param Assisted $assisted
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(StoreRequest $request, Assisted $assisted)
    {
        $assistedAsset = new AssistedAsset($request->all());
        $assistedAsset->assisted_id = $assisted->id;
        if ($assistedAsset->installment_price === "") {
            $assistedAsset->installment_price = 0.00;
        }

        try {
            $assistedAsset->save();

            return redirect()
                ->route('assistedAssets.index', $assisted->id)
                ->with('alert-success', 'Bem material do assistido cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro do bem material do assistido!' . $e->getMessage());
        }
    }
}
