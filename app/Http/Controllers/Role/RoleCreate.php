<?php

namespace App\Http\Controllers\Role;

use App\Forms\Role\RoleForm;
use App\Http\Controllers\Controller;

class RoleCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(RoleForm::class, [
            'url' => route('roles.store'),
            'method' => 'POST'
        ]);

        return view('roles.create', [
            'form' => $form
        ]);
    }
}
