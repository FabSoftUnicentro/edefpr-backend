<?php

namespace App\Http\Controllers\AttendmentType;

use App\Http\Controllers\Controller;
use App\Models\AttendmentType;
use Illuminate\Http\Request;

class AttendmentTypeUpdate extends Controller
{
    /**
     * @param Request $request
     * @param AttendmentType $attendmentType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, AttendmentType $attendmentType)
    {
        $attendmentType->update($request->all());

        try {
            $attendmentType->save();

            return redirect()
                ->route('attendmentTypes.index')
                ->with('alert-success', 'Tipo de atendimento atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do tipo de atendimento!');
        }
    }
}
