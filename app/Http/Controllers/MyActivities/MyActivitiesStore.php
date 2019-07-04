<?php

namespace App\Http\Controllers\MyActivities;

use App\Http\Controllers\Controller;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class MyActivitiesStore extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        LogActivityUtil::storeActivity($request);
        return redirect()->route('myActivities.index')->with('alert-success', 'Atividade registrada com sucesso!');
    }
}
