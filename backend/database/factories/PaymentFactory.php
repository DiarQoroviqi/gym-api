<?php

declare(strict_types=1);

namespace Database\Factories;

use Domain\Contracting\Models\Payment;
use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'user_id' => User::factory(),
            'price' => $this->faker->randomFloat(2, 15, 90),
        ];
    }
}
