<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = Tenant::all();

        $tenants->each(function($tenant) {
            \App\Models\Group::factory(5)->for($tenant)->create();
        });
    }
}
