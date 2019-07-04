<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class UserUpdate extends Controller
{
    /**
     * @param UpdateRequest $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function __invoke(Request $request, User $user)
    {
        $user->update($request->all());

        try {
            $user->save();

            LogActivityUtil::register($request->user(), "Dados do usuário $user->name atualizados");

            return redirect()
                ->route('users.index')
                ->with('alert-success', 'Funcionário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('alert-danger', 'Falha na atualização do funcionário!');
        }
    }
}
