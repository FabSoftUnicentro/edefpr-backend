<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounterPart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'rg',
        'rg_issuer',
        'phone_number',
        'remuneration',
        'profession',
        'note',
        'cpf',
        'uf',
        'city',
        'number',
        'street',
        'postcode',
        'complement',
        'neighborhood',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'counterpart';
}
