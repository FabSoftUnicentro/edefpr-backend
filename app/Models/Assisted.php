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
        'email',
        'cpf',
        'birth_date',
        'birthplace',
        'rg',
        'rg_issuer',
        'gender',
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
     * Generate json for the addresses attribute
     *
     * @param $value
     */
    public function setAddressesAttribute($value)
    {
        $this->attributes['addresses'] = json_encode($value);
    }
}
