<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\Role as RoleResource;
use App\Models\Role;

class RoleDestroy extends Controller
{
    /**
     * @param Role $role
     * @return RoleResource
     * @throws \Exception
     */
    public function __invoke(Role $role)
    {
        $role->delete();

        return new RoleResource($role);
    }
}
