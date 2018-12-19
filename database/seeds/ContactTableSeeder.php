<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contact::class, 10)->create();
    }
}
