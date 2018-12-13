<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Http\Resources\Role as RoleResource;

class RoleDestroy extends Controller
{
    /**
     * @param Role $role
     * @return RoleResource
     */
    public function __invoke(Role $role)
    {
        $role->delete();

        return new RoleResource($role);
    }
}
