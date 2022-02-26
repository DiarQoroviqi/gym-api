<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'client_id' => Client::factory(),
            'payment_date' => $this->faker->dateTimeBetween('-3 month', '-1 month'),
            'price' => $this->faker->randomFloat(2, 15, 90),
            'from_date' => $this->faker->dateTimeBetween('-3 month', '-1 month'),
            'to_date' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'comment' => null,
        ];
    }
}
