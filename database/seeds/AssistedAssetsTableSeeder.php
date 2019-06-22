<?php

use App\Models\Asset;
use Illuminate\Database\Seeder;

class AssistedAssetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Asset::class, 10)->create();
    }
}
