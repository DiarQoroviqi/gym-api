<?php

declare(strict_types=1);

use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Password;
use function Pest\Laravel\postJson;

it('should return 422 if missing parameters', function (string $password) {
    $user = User::factory()->create();

    $token = Password::createToken($user);

    postJson(route('api.v1.auth.reset-password'), [
        'email' => $user->email,
        'password' => $password,
        'token' => $token,
    ])
        ->assertStatus(422);
})->with(['new-password']);

it('can create new password', function (string $password) {
    $user = User::factory()->create();

    $token = Password::createToken($user);

    postJson(route('api.v1.auth.reset-password'), [
        'email' => $user->email,
        'password' => $password,
        'password_confirmation' => $password,
        'token' => $token,
    ])
        ->assertStatus(200);
})->with(['new-password']);
