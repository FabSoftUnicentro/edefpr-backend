<?php

namespace App\Http\Controllers\Assisted\Asset;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssistedAsset\UpdateRequest;
use App\Models\Asset;
use App\Models\Assisted;

class AssetUpdate extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param Assisted $assisted
     * @param Asset $asset
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdateRequest $request, Assisted $assisted, Asset $asset)
    {
        $asset->update($request->all());

        try {
            $asset->save();

            return redirect()
                ->route('assisteds.asset.index', $asset->assisted->id)
                ->with('alert-success', 'Bem material do assistido atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do bem material assistido!');
        }
    }
}
