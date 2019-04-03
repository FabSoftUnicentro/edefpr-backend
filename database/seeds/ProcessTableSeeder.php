<?php

use Illuminate\Database\Seeder;
use App\Models\Process;

class ProcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Process::class, 10)->create();
    }
}
