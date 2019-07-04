<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;

class UserAssignRole extends Controller
{
    /**
     * @param User $user
     * @param $role
     * @return UserResource
     */
    public function __invoke(User $user, $role)
    {
        /** User $user */
        $user->assignRole($role);

        LogActivityUtil::register(Auth::user(), "Função de $user->name atualizado");

        return new UserResource($user);
    }
}
