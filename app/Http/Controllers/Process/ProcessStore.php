<?php

namespace App\Http\Controllers\Process;

use App\Http\Controllers\Controller;
use App\Models\Process;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcessStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $process = new Process($request->all());
        $process->user()->associate(Auth::user());

        try {
            if ($process->assisted->getAssetsPrice() > 150000) {
                throw new \InvalidArgumentException('A soma dos bens do assistido excede 1500 UFP/PR');
            }
            $process->save();

            return redirect()
                ->route('processes.index')
                ->with('alert-success', 'Processo cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->with('alert-danger', 'Falha no cadastro do processo! ' . $e->getMessage());
        }
    }
}
