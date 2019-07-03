<?php

namespace App\Http\Controllers\LogActivity;

use App\Forms\LogActivity\LogActivityForm;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;

class LogActivityIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);
        $activities = Activity::with('causer')->orderBy('id')->paginate($perPage);

        $form = $this->formBuilder->create(LogActivityForm::class, [
            'url' => route('logActivity.filter'),
            'method' => 'GET'
        ]);

        return view('logActivity.index', [
            'form' => $form,
            'activities' => $activities
        ]);
    }
}
