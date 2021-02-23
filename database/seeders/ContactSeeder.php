<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::all();

        $tenants->each(function ($tenant) {
            \App\Models\Contact::factory(15)
                ->for($tenant)
                ->create();
        });
    }
}
