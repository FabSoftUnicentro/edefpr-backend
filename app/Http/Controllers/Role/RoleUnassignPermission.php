<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\Role as RoleResource;
use App\Models\Role;

class RoleUnassignPermission extends Controller
{
    /**
     * @param Role $role
     * @param $permission
     * @return RoleResource
     */
    public function __invoke(Role $role, $permission)
    {
        /** Role $role */
        $role->revokePermissionTo($permission);

        return new RoleResource($role);
    }
}
