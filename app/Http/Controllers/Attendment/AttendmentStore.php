<?php

namespace App\Http\Controllers\Attendment;

use App\Http\Controllers\Controller;
use App\Models\Attendment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendmentStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $attendment = new Attendment($request->all());
        $attendment->user_id = Auth::user()->id;

        try {
            $attendment->save();

            return redirect()
                ->route('attendments.index')
                ->with('alert-success', 'Atendimento cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha ao cadastrar novo atendimento!' . $e->getMessage());
        }
    }
}
