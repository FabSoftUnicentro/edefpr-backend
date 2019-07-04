<?php

namespace App\Http\Controllers\LogActivity;

use App\Forms\LogActivity\LogActivityForm;
use App\Http\Controllers\Controller;
use App\Utils\LogActivity\LogActivityUtil;
use Illuminate\Http\Request;

class LogActivityFilter extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $activities = LogActivityUtil::filter($request);

        $form = $this->formBuilder->create(LogActivityForm::class, [
            'url' => route('logActivity.filter'),
            'model' => $request->all(),
            'method' => 'GET'
        ]);

        return view('logActivity.index', [
            'form' => $form,
            'activities' => $activities
        ]);
    }
}
