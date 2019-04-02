<?php

namespace App\Models;

use App\Utils\Number;
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
        'document_type',
        'document_number',
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

    protected $table = 'counter_parts';

    /**
     * @param $value
     */
    public function setRemunerationAttribute($value)
    {
        $this->attributes['remuneration'] = Number::unmask($value);
    }
}
