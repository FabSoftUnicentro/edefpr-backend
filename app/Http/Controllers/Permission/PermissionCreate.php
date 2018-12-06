<?php

namespace App\Http\Controllers\Permission;

use App\Forms\Permission\PermissionForm;
use App\Http\Controllers\Controller;

class PermissionCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(PermissionForm::class, [
            'url' => route('permissions.store'),
            'method' => 'POST'
        ]);

        return view('permissions.create', [
            'form' => $form
        ]);
    }
}
