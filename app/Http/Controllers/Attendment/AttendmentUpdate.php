<?php

namespace App\Http\Controllers\Attendment;

use App\Http\Controllers\Controller;
use App\Models\Attendment;
use Illuminate\Http\Request;

class AttendmentUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Attendment $attendment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Attendment $attendment)
    {
        $attendment->update($request->all());

        try {
            $attendment->save();

            return redirect()
                ->route('attendments.index')
                ->with('alert-success', 'Atendimento atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do atendimento!');
        }
    }
}
