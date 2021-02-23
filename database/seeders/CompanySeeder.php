<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
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
            \App\Models\Company::factory(4)
                ->for($tenant)
                ->hasAttached(Contact::where('tenant_id', $tenant->id)->inRandomOrder()->limit(4)->get(), [], 'contacts')
                ->create();
        });
    }
}
