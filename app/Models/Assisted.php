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
     * Get the family income for the assisted.
     */
    public function FamilyIncome()
    {
        return $this->hasOne(FamilyIncome::class);
    }

    public function SetFamilyIncome()
    {
        $familyIncome = $this->familyIncome;
        $familyMembers = $this->familyMembers;
        $income = 0;
        foreach ($familyMembers as $familyMember) {
            $income += $familyMember->income;
        }
        $familyIncome->family_income = $income;

        $social_programs = $familyIncome->getAttribute('social_programs');
        $social_security_contribution = $familyIncome->getAttribute('social_security_contribution');
        $income_tax = $familyIncome->getAttribute('income_tax');
        $alimony = $familyIncome->getAttribute('alimony');
        $extraordinary_expenses = $familyIncome->getAttribute('extraordinary_expenses');

        $familyIncome->net_family_income = $income - $social_programs - $social_security_contribution - $income_tax - $alimony - $extraordinary_expenses;
        $familyIncome->save();
    }
}
