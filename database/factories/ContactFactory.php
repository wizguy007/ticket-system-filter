<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'tenant_id' => Tenant::factory(),
            'title' => $this->faker->title($gender),
            'name' => $this->faker->name($gender),
            'email' => $this->faker->unique()->safeEmail,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'work_phone' => $this->faker->e164PhoneNumber,
            'mobile_phone' => $this->faker->e164PhoneNumber,
            'twitter' => $this->faker->url,
            'unique_external_id' => null,
            'address' => $this->faker->address,
            'timezone' => $this->faker->timezone,
            'language' => $this->faker->languageCode,
            'tags' => implode(',', $this->faker->words(10)),
            'about' => $this->faker->sentence(),
        ];
    }
}
