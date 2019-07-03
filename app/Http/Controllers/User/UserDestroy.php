<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Support\Facades\Auth;

class UserDestroy extends Controller
{
    /**
     * @param User $user
     * @return UserResource
     * @throws \Exception
     */
    public function __invoke(User $user)
    {
        $user->delete();

        LogActivityUtil::register(Auth::user(), "Usuário $user->name apagado");

        return new UserResource($user);
    }
}
