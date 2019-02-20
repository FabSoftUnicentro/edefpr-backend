<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;

class RoleAllPermissions extends Controller
{
    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Role $role)
    {
        $permissions = Permission::all();
        $result = [];

        foreach ($permissions as $permission) {
            $result[] = [
                'id' => $permission->id,
                'description' => $permission->description,
                'chosen' => $role->hasPermissionTo($permission->id)
            ];
        }

        return view('roles.permission', [
            'permissions' => $result,
            'role' => $role
        ]);
    }
}
