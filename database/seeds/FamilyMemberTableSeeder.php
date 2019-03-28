<?php

use Illuminate\Database\Seeder;
use App\Models\FamilyMember;

class FamilyMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FamilyMember::class, 10)->create();
    }
}
