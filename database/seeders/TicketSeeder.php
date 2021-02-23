<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Tenant;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class TicketSeeder extends Seeder
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

            $groups = Group::whereHas('agents')->with('agents')->where('tenant_id', $tenant->id)->inRandomOrder()->get();

            \App\Models\Ticket::factory()
                ->count(10)
                ->state(function() use ($groups) {
                    $group = $groups->random();
                    return  [
                        'group_id' => $group->id,
                        'agent_id' => $group->agents->random(),
                    ];
                })
                ->for($tenant)
                ->for(Contact::where('tenant_id', $tenant->id)->inRandomOrder()->first(), 'contact')
                ->create();
        });
    }
}
