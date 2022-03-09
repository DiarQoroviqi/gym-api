<?php

namespace Database\Seeders;

use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Diar Qoroviqi',
            'email' => 'qoroviqidiar@gmail.com',
        ]);

        User::factory(10)->create();
    }
}
