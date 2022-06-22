<?php

declare(strict_types=1);

use App\Permissions\Role;
use Domain\Contracting\Models\Client;
use Domain\Shared\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can retrieve a client', function () {
    $client = Client::factory()->create();

    $this->user->assignRole(Role::RECEPTIONIST);

    $response = $this->actingAs($this->user)
        ->getJson(route('api.v1.clients.show', $client->uuid));

    $response->assertOk();

    expect($response->getContent())
        ->json()
        ->id->toBe($client->uuid)
        ->type->toBe('client')
        ->first_name->toBe($client->first_name)
        ->last_name->toBe($client->last_name)
        ->phone->toBe($client->phone)
        ->comment->toBe($client->comment)
        ->links->self->toBe(route('api.v1.clients.show', $client));
});
