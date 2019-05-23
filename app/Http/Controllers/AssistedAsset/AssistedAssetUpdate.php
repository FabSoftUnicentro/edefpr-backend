<?php

namespace App\Http\Controllers\AssistedAsset;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssistedAsset\UpdateRequest;
use App\Models\AssistedAsset;
use Illuminate\Http\Request;

class AssistedAssetUpdate extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param AssistedAsset $assistedAsset
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdateRequest $request, AssistedAsset $assistedAsset)
    {
        $assistedAsset->update($request->all());

        try {
            $assistedAsset->save();

            return redirect()
                ->route('assistedAssets.show', $assistedAsset->id)
                ->with('alert-success', 'Bem material do assistido atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do bem material assistido!');
        }
    }
}
