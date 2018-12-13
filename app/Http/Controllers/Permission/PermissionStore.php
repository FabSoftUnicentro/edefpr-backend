<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $permission = new Permission($request->all());

        try {
            $permission->save();

            return redirect()
                ->route('permissions.index')
                ->with('alert-success', 'Permissão cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro da permissão!' . $e->getMessage());
        }
    }
}
