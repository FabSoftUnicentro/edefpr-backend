<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyIncome extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_income',
        'social_programs',
        'social_security_contribution',
        'income_tax',
        'alimony',
        'extraordinary_expenses',
        'net_family_income',
        'assisted_id'
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Get the assisted one that has the familiar member.
     */
    public function assisted()
    {
        return $this->belongsTo(Assisted::class);
    }
}
