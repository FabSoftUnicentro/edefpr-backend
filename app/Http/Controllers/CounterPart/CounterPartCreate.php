<?php

namespace App\Http\Controllers\CounterPart;

use App\Forms\CounterPart\CounterPartForm;
use App\Http\Controllers\Controller;

class CounterPartCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(CounterPartForm::class, [
            'url' => route('counterParts.store'),
            'method' => 'POST'
        ]);

        return view('counterParts.create', [
            'form' => $form,
        ]);
    }
}
