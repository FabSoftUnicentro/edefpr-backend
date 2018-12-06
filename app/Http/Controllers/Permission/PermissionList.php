<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Http\Resources\Permission as PermissionResource;

class PermissionList extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $permissions = Permission::paginate($this->itemsPerPage);

        return PermissionResource::collection($permissions);
    }
}
