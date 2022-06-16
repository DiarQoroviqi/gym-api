<?php

declare(strict_types=1);

use App\Permissions\Role;
use Domain\Contracting\Models\Client;
use Domain\Shared\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can show client', function () {
    $client = Client::factory()->create();

    $this->user->assignRole(Role::RECEPTIONIST);

    $response = $this->actingAs($this->user)
        ->getJson(route('api.v1.clients.show', $client->uuid));

    $response->assertOk();

    expect($response->getContent())
        ->json()
        ->id->toBe($client->uuid)
        ->type->toBe('client')
        ->attributes->first_name->toBe($client->first_name)
        ->attributes->last_name->toBe($client->last_name)
        ->attributes->phone->toBe($client->phone)
        ->attributes->comment->toBe($client->comment);
});
