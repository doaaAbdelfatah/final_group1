<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactType::create(["type"=>"Email"]);
        ContactType::create(["type"=>"Mobile"]);
        ContactType::create(["type"=>"Address"]);
        ContactType::create(["type"=>"Home Phone"]);
        ContactType::create(["type"=>"Fax"]);
    }
}
