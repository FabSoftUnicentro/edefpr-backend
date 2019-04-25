<?php
/**
 * Created by PhpStorm.
 * User: SUdoW
 * Date: 20/02/2019
 * Time: 20:45
 */

namespace App\Http\Controllers\CounterPart;

use App\Http\Controllers\Controller;
use App\Models\CounterPart;
use Illuminate\Http\Request;

class CounterPartUpdate extends Controller
{
    /**
     * @param Request $request
     * @param CounterPart $counterPart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, CounterPart $counterPart)
    {
        $counterPart->update($request->all());

        try {
            $counterPart->save();

            return redirect()
                ->route('counterParts.index')
                ->with('alert-success', 'Parte contraria atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização da parte contraria!');
        }
    }
}
