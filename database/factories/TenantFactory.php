<?php

namespace Database\Factories;

use App\Models\Tenant;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $companyName = $this->faker->unique()->company;
        return [
            'name' => $companyName,
            'domain' => Str::slug($companyName). ".freshdesk.com"
        ];
    }
}
