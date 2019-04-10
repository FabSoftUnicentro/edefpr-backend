<?php

namespace App\Http\Controllers\CounterPart;

use App\Http\Controllers\Controller;
use App\Http\Resources\CounterPart as CounterPartResource;
use App\Models\CounterPart;
use Illuminate\Http\Request;

class CounterPartStore extends Controller
{
    /**
     * @param Request $request
     * @return CounterPartResource
     * @throws \Throwable
     */
    public function __invoke(Request $request)
    {
        $counterPart = new CounterPart($request->all());

        try {
            $counterPart->save();

            return redirect()
                ->route('counterParts.index')
                ->with('alert-success', 'Parte contrária cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao cadastrar parte contrária!');
        }
    }
}
