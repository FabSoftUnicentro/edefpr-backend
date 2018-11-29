<?php

namespace App\Http\Controllers\Assisted;

use App\Forms\Assisted\AssistedForm;
use App\Http\Controllers\Controller;

class AssistedCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(AssistedForm::class, [
            'url' => route('assisteds.store'),
            'method' => 'POST'
        ]);

        return view('assisteds.create', [
            'form' => $form
        ]);
    }
}
