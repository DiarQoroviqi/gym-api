<?php

declare(strict_types=1);

use App\Permissions\Role;
use Domain\Contracting\Models\Client;
use Domain\Shared\Models\User;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can create a client as a receptionist', function () {
    $client = Client::factory()->make();

    $this->user->assignRole(Role::RECEPTIONIST);

    $this->actingAs($this->user)->postJson(route('api.v1.clients.store'), [
        'first_name' => $client->first_name,
        'last_name' => $client->last_name,
        'phone' => $client->phone,
        'comment' => $client->comment,
    ])->assertStatus(Response::HTTP_CREATED);

    $this->assertDatabaseCount('clients', 1);

    $this->assertDatabaseHas('clients', [
        'first_name' => $client->first_name,
        'last_name' => $client->last_name,
        'phone' => $client->phone,
        'comment' => $client->comment,
    ]);
});
