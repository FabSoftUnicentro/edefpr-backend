<?php

namespace App\Http\Controllers\Witness;

use App\Http\Controllers\Controller;
use App\Models\Witness;

class WitnessShow extends Controller
{
    /**
     * @param Witness $witness
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Witness $witness)
    {
        return view('witnesses.show', [
            'witness' => $witness
        ]);
    }
}
