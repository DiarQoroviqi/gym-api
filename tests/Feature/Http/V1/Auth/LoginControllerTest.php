<?php

declare(strict_types=1);

use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Hash;
use function Pest\Laravel\postJson;

it('should return 422 if password is wrong', function (string $password) {
    $user = User::factory()->create([
        'password' => Hash::make($password),
    ]);

    postJson(route('api.v1.auth.login'), [
        'email' => $user->email,
        'password' => 'wrong-password',
    ])
        ->assertStatus(422);
})->with(['password']);

it('can authenticate user', function () {
    $user = User::factory()->create();

    $response = $this->post(route('api.v1.auth.login'), [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response
       ->assertStatus(200)
       ->assertJsonStructure([
           'data' => [
               'name',
               'email',
               'token',
           ],
       ]);
});
