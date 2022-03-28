<?php

declare(strict_types=1);

namespace Database\Seeders;

use Domain\Shared\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Diar Qoroviqi',
            'email' => 'qoroviqidiar@gmail.com',
        ]);

        $admin->assignRole('super-admin');

        User::factory(5)->create()->each(function (User $user, $key) {
            if ($key % 2 === 0) {
                $user->assignRole('receptionist');
            } else {
                $user->assignRole('coach');
            }
        });
    }
}
