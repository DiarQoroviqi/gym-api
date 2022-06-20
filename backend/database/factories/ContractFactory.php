<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContractFactory extends Factory
{
    protected $model = Contract::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'client_id' => Client::factory(),
            'payed_at' => $this->faker->dateTimeBetween('-3 month', '-1 month'),
            'price' => $this->faker->randomFloat(2, 15, 90),
            'started_at' => $this->faker->dateTimeBetween('-3 month', '-1 month'),
            'expired_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'comment' => null,
        ];
    }
}
