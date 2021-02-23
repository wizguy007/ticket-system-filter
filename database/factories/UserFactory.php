<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tenant_id' => Tenant::factory(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'agent_type' => $this->faker->randomElement(self::agentType()),
            'avatar' => $this->faker->imageUrl(),
            'timezone' => $this->faker->timezone,
            'language' => $this->faker->languageCode,
            'signature' => $this->faker->word(),
            'ticket_scope' => $this->faker->randomElement(self::ticketScope()),
            'support_channel' => $this->faker->randomElement(self::supportChannel()),
            'role' => $this->faker->randomElement(self::role()),

            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public static function agentType() : array
    {
        return [
            'full_time', 'associate'
        ];
    }

    public static function ticketScope() : array
    {
        return [
            'global', 'restricted', 'group_assigned'
        ];
    }

    public static function role() : array
    {
        return [
            'agent', 'supervisor', 'administrator', 'account_administrator'
        ];
    }

    public static function supportChannel() : array
    {
        return [
            'ticket', 'phone', 'chat'
        ];
    }
}
