<?php

namespace App\Http\Controllers\Assisted;

use App\Forms\Assisted\AssistedForm;
use App\Http\Controllers\Controller;
use App\Models\Assisted;

class AssistedEdit extends Controller
{
    /**
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Assisted $assisted)
    {
        $form = $this->formBuilder->create(AssistedForm::class, [
            'url' => route('assisteds.update', $assisted->id),
            'method' => 'PUT',
            'model' => $assisted
        ]);

        return view('assisteds.edit', [
            'form' => $form
        ]);
    }
}
