<?php

namespace App\Http\Controllers\MyActivities;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class MyActivitiesIndex extends Controller
{
    private $itemsPerPage = 10;

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request)
    {
        $perPage = $request->query->get('perPage', $this->itemsPerPage);
        $activities = Activity::with('causer')->causedBy($request->user())->paginate($perPage);

        return view('myActivities.index', [
            'activities' => $activities
        ]);
    }
}
