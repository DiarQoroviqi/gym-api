<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use Domain\Contracting\Models\Payment;
use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
        ]);

        Client::factory(20)->create()->each(function (Client $client) {
            Contract::factory()->for($client)->create();
        });

        Payment::factory(20)->sequence(function () {
            return [
                'user_id' => User::all()->random(),
            ];
        })->create();
    }
}
