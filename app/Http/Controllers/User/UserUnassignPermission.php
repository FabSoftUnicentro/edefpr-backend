<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\Permission;
use App\Models\User;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;

class UserUnassignPermission extends Controller
{
    /**
     * @param User $user
     * @param Permission $permission
     * @return UserResource
     */
    public function __invoke(User $user, Permission $permission)
    {
        /** User $user */
        $user->revokePermissionTo($permission);

        LogActivityUtil::register(Auth::user(), "Permissões de $user->name atualizada");

        return new UserResource($user);
    }
}
