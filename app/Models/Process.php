<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'assisted_id',
        'counter_part_id'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get all of the assisteds for the assisted.
     */
    public function assisteds()
    {
        return $this->hasMany(Assisted::class);
    }

    /**
     * Get all of the counter parts for the assisted.
     */
    public function counterParts()
    {
        return $this->hasMany(CounterPart::class);
    }
}
