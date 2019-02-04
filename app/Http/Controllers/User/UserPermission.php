<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserPermission extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $users = User::all();

        return view('users.assign', [
            'users' => $users,
        ]);
    }
}
