<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleAssignPermission extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        dd('sdasd');
        $perPage = $request->query->get('perPage', 10);

        $roles = Role::query($perPage);

        return view('roles.assign', [
            'roles' => $roles
        ]);
    }
}
