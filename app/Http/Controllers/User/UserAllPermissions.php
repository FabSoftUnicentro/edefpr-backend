<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class UserAllPermissions extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(User $user)
    {
        $result = [];
        $rolePermissions = [];
        $permissions = Permission::all();
        $roles = $user->getRoleNames();

        foreach ($permissions as $permission) {
            foreach ($roles as $role) {
                if(Role::findByName($role)->hasPermissionTo($permission->id)) {
                    $rolePermissions[] = [
                        'description' => $permission->description
                    ];
                } else {
                    $result[] = [
                        'id' => $permission->id,
                        'description' => $permission->description,
                        'chosen' => $user->hasPermissionTo($permission->id)
                    ];
                }
            }
        }

        return view('users.permission', [
            'permissions' => $result,
            'rolePermissions' => $rolePermissions,
            'user' => $user
        ]);
    }
}
