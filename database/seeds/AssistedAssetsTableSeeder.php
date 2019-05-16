<?php

use App\Models\Assisted;
use Illuminate\Database\Seeder;

class AssistedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Assisted::class, 10)->create();
    }
}
