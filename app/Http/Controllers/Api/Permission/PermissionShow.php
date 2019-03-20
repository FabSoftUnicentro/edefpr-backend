<?php

namespace App\Http\Controllers\Api\Permission;

use App\Http\Controllers\Controller;
use App\Http\Resources\Permission as PermissionResource;
use Spatie\Permission\Models\Permission;

class PermissionShow extends Controller
{
    /**
     * @param Permission $permission
     * @return PermissionResource
     */
    public function __invoke(Permission $permission)
    {
        return new PermissionResource($permission);
    }
}
