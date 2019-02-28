<?php

use Illuminate\Database\Seeder;
use App\Models\FamilyComposition;

class FamilyCompositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FamilyComposition::class, 10)->create();
    }
}
