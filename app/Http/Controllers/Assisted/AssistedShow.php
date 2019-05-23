<?php

namespace App\Http\Controllers\Assisted;

use App\Http\Controllers\Controller;
use App\Models\Assisted;

class AssistedShow extends Controller
{
    /**
     * @param Assisted $assisted
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Assisted $assisted)
    {
        $assisted->rental_value = money($assisted->rental_value);

        return view('assisteds.show', [
            'assisted' => $assisted
        ]);
    }
}
