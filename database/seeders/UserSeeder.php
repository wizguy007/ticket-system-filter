<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
            \App\Models\User::factory(7)
                ->for($tenant)
                ->hasAttached(Group::where('tenant_id', $tenant->id)->inRandomOrder()->limit(2)->get(), [],'groups')
                ->create();
        });
    }
}
