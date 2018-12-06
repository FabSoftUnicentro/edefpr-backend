<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $roles = Role::paginate($perPage);

        return view('roles.index', [
            'roles' => $roles
        ]);
    }
}
