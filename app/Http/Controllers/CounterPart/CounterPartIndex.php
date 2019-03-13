<?php
/**
 * Created by PhpStorm.
 * User: SUdoW
 * Date: 20/02/2019
 * Time: 20:45
 */

namespace App\Http\Controllers\CounterPart;

use App\Http\Controllers\Controller;
use App\Models\CounterPart;
use Illuminate\Http\Request;

class CounterPartIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);

        $counterPart = CounterPart::paginate($perPage);

        return view('counterParts.index', [
            'counterParts' => $counterPart
        ]);
    }
}
