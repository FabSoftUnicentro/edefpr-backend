<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $role = new Role($request->all());

        try {
            $role->save();

            return redirect()
                ->route('roles.index')
                ->with('alert-success', 'Nível de acesso cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro do nível de acesso!' . $e->getMessage());
        }
    }
}
