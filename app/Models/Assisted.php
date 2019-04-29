<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assisted extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'social_name',
        'email',
        'cpf',
        'birth_date',
        'rg',
        'rg_issuer',
        'gender',
        'naturalness',
        'schooling',
        'marital_status',
        'note',
        'uf',
        'city',
        'number',
        'street',
        'postcode',
        'complement',
        'neighborhood',
        'profession',
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
     * Get all of the family members for the assisted.
     */
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }

    /**
     * Get all of the processes for the assisted.
     */
    public function process()
    {
        return $this->belongsTo(Process::class);
    }
}
