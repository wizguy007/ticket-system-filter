<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Group;
use App\Models\Tenant;
use App\Models\Ticket;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tenant_id' => Tenant::factory(),
            'contact_id' => Contact::factory(),
            'subject' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(self::ticketType()),
            'source' => $this->faker->randomElement(self::ticketSource()),
            'status' => $this->faker->randomElement(self::ticketStatus()),
            'priority' => $this->faker->randomElement(self::ticketPriority()),
            'description' => $this->faker->sentence(10),
            'tags' => implode(',', $this->faker->words(10)),
            'group_id' => Group::factory(),
            'agent_id' => User::factory(),
        ];
    }

    public static function ticketType(): array
    {
        return ['question', 'problem', 'incident', 'refund'];
    }

    public static function ticketSource(): array
    {
        return ['phone', 'chat', 'email'];
    }
    
    public static function ticketStatus(): array
    {
        return ['open', 'pending', 'resolved', 'closed'];
    }

    public static function ticketPriority(): array
    {
        return ['low', 'medium', 'high', 'urgent'];
    }
}
