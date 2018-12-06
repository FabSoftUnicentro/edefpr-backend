<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionShow extends Controller
{
    /**
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Permission $permission)
    {
        return view('permissions.show', [
            'permission' => $permission
        ]);
    }
}
