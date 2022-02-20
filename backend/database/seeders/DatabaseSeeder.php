<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Contract;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);

        Client::factory(10)->create()->each(function(Client $client) {
            Contract::factory(1)->create();
        });

        Payment::factory(10)->sequence(function () {
            return [
                'user_id' => User::all()->random(),
            ];
        })->create();
    }
}
