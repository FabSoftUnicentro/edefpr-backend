<?php

use App\Models\Attendment;
use Illuminate\Database\Seeder;

class AttendmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Attendment::class, 10)->create();
    }
}
