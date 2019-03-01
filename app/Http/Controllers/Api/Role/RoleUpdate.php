<?php

namespace App\Http\Controllers\Api\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\UpdateRequest;
use App\Http\Resources\Role as RoleResource;
use Spatie\Permission\Models\Role;

class RoleUpdate extends Controller
{
    /**
     * @param Role $role
     * @param UpdateRequest $request
     * @return RoleResource
     * @throws \Throwable
     */
    public function __invoke(Role $role, UpdateRequest $request)
    {
        $role->update($request->all());

        $role->saveOrFail();

        return new RoleResource($role);
    }
}
