<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use App\Models\Permission;

class UserAssignPermission extends Controller
{
    /**
     * @param User $user
     * @param Permission $permission
     * @return UserResource
     */
    public function __invoke(User $user, Permission $permission)
    {
        /** User $user */
        $user->givePermissionTo($permission);

        return new UserResource($user);
    }
}
