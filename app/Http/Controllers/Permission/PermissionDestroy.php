<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Http\Resources\Permission as PermissionResource;
use App\Models\Permission;

class PermissionDestroy extends Controller
{
    /**
     * @param Permission $permission
     * @return PermissionResource
     * @throws \Exception
     */
    public function __invoke(Permission $permission)
    {
        $permission->delete();

        return new PermissionResource($permission);
    }
}
