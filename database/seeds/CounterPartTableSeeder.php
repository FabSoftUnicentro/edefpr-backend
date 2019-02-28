<?php

use App\Models\CounterPart;
use Illuminate\Database\Seeder;

class CounterPartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CounterPart::class, 10)->create();
    }
}
