<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\User;

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

        return new UserResource($user);
    }
}
