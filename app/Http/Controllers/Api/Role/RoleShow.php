<?php

namespace App\Http\Controllers\Api\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\Role as RoleResource;
use Spatie\Permission\Models\Role;

class RoleShow extends Controller
{
    /**
     * @param Role $role
     * @return RoleResource
     */
    public function __invoke(Role $role)
    {
        return new RoleResource($role);
    }
}
