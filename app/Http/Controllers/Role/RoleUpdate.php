<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Role $role)
    {
        $role->update($request->all());

        try {
            $role->save();

            return redirect()
                ->route('roles.index')
                ->with('alert-success', 'Nível de acesso atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do nível de acesso!');
        }
    }
}
