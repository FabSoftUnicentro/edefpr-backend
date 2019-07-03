<?php

namespace App\Models;

use \Spatie\Activitylog\Models\Activity as SpatieActivity;

class Activity extends SpatieActivity
{
    /**
     * @param $query
     * @param $causerId
     * @return mixed
     */
    public function scopeCauser($query, $causerId)
    {
        return $causerId ? $query->where('causer_id', '=', $causerId) : $query;
    }

    /**
     * @param $query
     * @param $date
     * @return mixed
     */
    public function scopeInitialDate($query, $date)
    {
        return $date ? $query->whereDate('date', '>=', $date) : $query;
    }

    /**
     * @param $query
     * @param $date
     * @return mixed
     */
    public function scopeFinalDate($query, $date)
    {
        return $date ? $query->whereDate('date', '<=', $date) : $query;
    }

    /**
     * @param $query
     * @param $hour
     * @return mixed
     */
    public function scopeInitialHour($query, $hour)
    {
        return $hour ? $query->whereTime('hour', '>=', $hour) : $query;
    }

    /**
     * @param $query
     * @param $hour
     * @return mixed
     */
    public function scopeFinalHour($query, $hour)
    {
        return $hour ? $query->whereTime('hour', '<=', $hour) : $query;
    }
}
