<?php

declare(strict_types=1);

use App\Permissions\Role;
use Domain\Shared\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\actingAs;
use Tests\CreatesApplication;
use Tests\TestCase;

uses(TestCase::class, CreatesApplication::class, RefreshDatabase::class)
    ->in('Unit', 'Feature');

function login(User $user = null)
{
    $admin = User::factory()->create();
    $admin->assignRole(Role::SUPER_ADMIN);

    actingAs($user ?? $admin);
}
