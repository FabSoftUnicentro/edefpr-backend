<?php

namespace App\Http\Controllers\Utils\City;

use App\Http\Controllers\Controller;
use App\Utils\Brazil;
use Illuminate\Http\Request;

class CityList extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $cities = Brazil::cities($request->uf);

        return response()->json([
            'cities' => $cities
        ]);
    }
}
