<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionUpdate extends Controller
{
    /**
     * @param Request $request
     * @param Permission $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Permission $permission)
    {
        $permission->update($request->all());

        try {
            $permission->save();

            return redirect()
                ->route('permissions.index')
                ->with('alert-success', 'Permission atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização da Permissão!');
        }
    }
}
