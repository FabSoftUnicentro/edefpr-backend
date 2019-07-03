<?php

namespace App\Utils\LogActivity;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Activity as ActivityMode;
use Spatie\Activitylog\Models\Activity;

class LogActivityUtil
{
    public static function register(User $user, $text)
    {
        activity()
            ->causedBy($user)
            ->tap(function ($activity) {
                $activity->date = date('Y-m-d');
                $activity->hour = date('H:i:s');
            })
            ->log($text);
    }

    public static function storeActivity(Request $request)
    {
        activity()
            ->causedBy($request->user())
            ->tap(function (Activity $activity) use ($request) {
                $activity->date = $request->input('date', date('d/m/Y'));
                $activity->hour = $request->input('hour', date('H:i:s'));
            })
            ->log($request->activity);
    }

    public static function filter(Request $request)
    {
        $dateInitial = $request->input('dateInitial');
        $dateFinal = $request->input('dateFinal');
        $hourInitial = $request->input('hourInitial');
        $hourFinal = $request->input('hourFinal');

        return ActivityMode::with('causer')
            ->causer($request->input('user_id'))
            ->initialDate($dateInitial)
            ->finalDate($dateFinal)
            ->initialHour($hourInitial)
            ->finalHour($hourFinal)
            ->paginate();
    }
}
