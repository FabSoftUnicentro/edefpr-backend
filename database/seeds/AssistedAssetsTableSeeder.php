<?php

use App\Models\AssistedAssets;
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
        factory(AssistedAssets::class, 10)->create();
    }
}
