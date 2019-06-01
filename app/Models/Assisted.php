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
        'social_programs',
        'social_security_contribution',
        'income_tax',
        'alimony',
        'extraordinary_expenses',
        'residence_kind',
        'residence_situation',
        'rental_value'
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

    /**
     * Get all of the assets for the assisted.
     */
    public function assistedAssets()
    {
        return $this->hasMany(AssistedAsset::class);
    }

    /**
     * @param bool $round
     * @return float|mixed
     */
    public function getNetFamilyIncome($round = true)
    {
        $familyMembersIncome = $this->familyMembers->sum('income');

        $social_programs = $this->social_programs;
        $social_security_contribution = $this->social_security_contribution;
        $income_tax = $this->income_tax;
        $alimony = $this->alimony;
        $extraordinary_expenses = $this->extraordinary_expenses;

        $total = $familyMembersIncome - $social_programs - $social_security_contribution - $income_tax - $alimony - $extraordinary_expenses;

        return $round ? round($total, 2) : $total;
    }

    /**
     * @param bool $round
     * @return float
     */
    public function getFamilyIncome($round = true)
    {
        $total = $this->familyMembers->sum('income');

        return $round ? round($total, 2) : $total;
    }
}
