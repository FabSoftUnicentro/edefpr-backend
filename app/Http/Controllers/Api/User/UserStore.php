<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User as UserResource;
use App\Models\User;

class UserStore extends Controller
{
    /**
     * @param StoreRequest $request
     * @return UserResource
     * @throws \Throwable
     */
    public function __invoke(StoreRequest $request)
    {
        /** @var User $user */
        $user = new User($request->all());

        $user->saveOrFail();

        return new UserResource($user);
    }
}
