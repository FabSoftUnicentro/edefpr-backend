<?php

use App\Models\AssistedAsset;
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
        factory(AssistedAsset::class, 10)->create();
    }
}
