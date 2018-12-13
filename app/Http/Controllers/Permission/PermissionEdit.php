<?php

namespace App\Http\Controllers\Permission;

use App\Forms\Permission\PermissionForm;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionEdit extends Controller
{
    /**
     * @param Permission $permission
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Permission $permission)
    {
        $form = $this->formBuilder->create(PermissionForm::class, [
            'url' => route('permissions.update', $permission->id),
            'method' => 'PUT',
            'model' => $permission
        ]);

        return view('permissions.edit', [
            'form' => $form
        ]);
    }
}
