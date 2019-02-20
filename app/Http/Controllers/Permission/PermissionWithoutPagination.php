<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Http\Resources\Permissions as ResourcePermission;
use Illuminate\Http\Request;

class PermissionWithoutPagination extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $permissions = Permission::All();

        return $permissions;
    }
}
