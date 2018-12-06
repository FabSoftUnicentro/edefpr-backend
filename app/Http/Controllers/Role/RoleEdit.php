<?php

namespace App\Http\Controllers\Role;

use App\Forms\Role\RoleForm;
use App\Http\Controllers\Controller;
use App\Models\Role;

class RoleEdit extends Controller
{
    /**
     * @param Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Role $role)
    {
        $form = $this->formBuilder->create(RoleForm::class, [
            'url' => route('roles.update', $role->id),
            'method' => 'PUT',
            'model' => $role
        ]);

        return view('roles.edit', [
            'form' => $form
        ]);
    }
}
