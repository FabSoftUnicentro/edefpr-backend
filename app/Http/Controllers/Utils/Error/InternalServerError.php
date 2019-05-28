<?php

namespace App\Http\Controllers\Utils\Error;

use App\Http\Controllers\Controller;

class InternalServerError extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        return view('error.404');
    }
}
