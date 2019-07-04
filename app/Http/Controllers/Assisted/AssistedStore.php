<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Models\Assisted;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class AssistedStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $assisted = new Assisted($request->all());

        try {
            $assisted->save();
            LogActivityUtil::register($request->user(), "Assistido $assisted->name registrado(a)");

            return redirect()
                ->route('assisteds.index')
                ->with('alert-success', 'Assistido cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro do assistido!' . $e->getMessage());
        }
    }
}
