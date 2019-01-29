<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Permission;
use App\Models\User;

class UserAllPermissions extends Controller
{
    /**
     * @param User $user
     * @return JsonResponse
     */
    public function __invoke(User $user)
    {
        $permissions = Permission::all();
        $result = [];
        foreach ($permissions as $permission) {
            $result[] = [
                'id' => $permission->id,
                'description' => $permission->description,
                'chosen' => $user->hasPermissionTo($permission->id)
            ];
        }
        return JsonResponse::create($result);
    }
}
