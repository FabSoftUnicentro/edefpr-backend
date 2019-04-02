<?php

namespace App\Http\Controllers\CounterPart;

use App\Forms\CounterPart\CounterPartForm;
use App\Http\Controllers\Controller;
use App\Models\CounterPart;

class CounterPartEdit extends Controller
{
    /**
     * @param CounterPart $counterPart
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(CounterPart $counterPart)
    {
        $form = $this->formBuilder->create(CounterPartForm::class, [
            'url' => route('counterParts.update', $counterPart->id),
            'method' => 'PUT',
            'model' => $counterPart
        ]);

        return view('counterParts.edit', [
            'form' => $form
        ]);
    }
}
