<?php

use App\Models\Witness;
use Illuminate\Database\Seeder;

class WitnessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Witness::class, 10)->create();
    }
}
