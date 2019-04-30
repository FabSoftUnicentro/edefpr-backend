<?php

use App\Models\FamilyIncome;
use Illuminate\Database\Seeder;

class FamilyIncomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FamilyIncome::class, 10)->create();
    }
}
