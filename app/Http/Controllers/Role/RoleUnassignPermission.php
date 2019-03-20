<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\Role as RoleResource;
use App\Models\Permission;
use App\Models\Role;

class RoleUnassignPermission extends Controller
{
    /**
     * @param Role $role
     * @param Permission $permission
     * @return RoleResource
     */
    public function __invoke(Role $role, Permission $permission)
    {
        $role->revokePermissionTo($permission);

        return new RoleResource($role);
    }
}
