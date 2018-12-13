<?php

namespace App\Http\Controllers\AttendmentType;

use App\Http\Controllers\Controller;
use App\Models\AttendmentType;
use Illuminate\Http\Request;

class AttendmentTypeStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $attendmentType = new AttendmentType($request->all());

        try {
            $attendmentType->save();

            return redirect()
                ->route('attendmentTypes.index')
                ->with('alert-success', 'Tipo de atendimento cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao cadastrar novo tipo de atendimento!' . $e->getMessage());
        }
    }
}
