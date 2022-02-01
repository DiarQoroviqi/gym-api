<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Drink;
use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    public function run(): void
    {
        Drink::factory(10)->create();
    }
}
