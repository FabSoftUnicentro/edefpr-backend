<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Resources\Role as RoleResource;
use App\Models\Role;

class RoleList extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        $roles = Role::paginate($this->itemsPerPage);

        return RoleResource::collection($roles);
    }
}
