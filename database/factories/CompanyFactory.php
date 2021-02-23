<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tenant_id' => Tenant::factory(),
            'logo' => $this->faker->imageUrl(),
            'name' => $this->faker->unique()->company,
            'description' => $this->faker->sentence(),
            'notes' => $this->faker->sentence(),
            'domains' => $this->faker->domainName,
            'health_score' => $this->faker->randomElement(self::healthScore()),
            'account_tier' => $this->faker->randomElement(self::accountTier()),
            'renewal_date' => $this->faker->date(),
            'industry' => $this->faker->randomElement(self::industry()),
        ];
    }

    public static function healthScore(): array
    {
        return ['at_risk', 'doing_ok', 'happy'];
    }

    public static function accountTier(): array
    {
        return ['basic', 'premium', 'enterprise'];
    }

    public static function industry(): array
    {
        return ['hotel', 'automotive', 'education_service'];
    }
}
