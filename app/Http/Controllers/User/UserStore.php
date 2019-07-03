<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class UserStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function __invoke(Request $request)
    {
        $user = new User($request->all());

        try {
            $user->save();
            LogActivityUtil::register($request->user(), "Usuário $user->name registrado");

            return redirect()
                ->route('users.index')
                ->with('alert-success', 'Funcionário cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha no cadastro do funcionário!' . $e->getMessage());
        }
    }
}
