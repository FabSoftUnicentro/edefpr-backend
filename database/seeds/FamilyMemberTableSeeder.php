<?php

use App\Models\FamilyMember;
use Illuminate\Database\Seeder;

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
