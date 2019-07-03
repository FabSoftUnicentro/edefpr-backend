<?php

namespace App\Http\Controllers\MyActivities;

use App\Forms\MyActivities\MyActivitiesForm;
use App\Http\Controllers\Controller;

class MyActivitiesCreate extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $form = $this->formBuilder->create(MyActivitiesForm::class, [
            'url' => route('myActivities.store'),
            'method' => 'POST'
        ]);

        return view('myActivities.create', [
            'form' => $form
        ]);
    }
}
