<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserShow extends Controller
{
    /**
     * @param User $user
     * @return UserResource|JsonResponse
     */
    public function __invoke(User $user)
    {
        return new UserResource($user);
    }
}
