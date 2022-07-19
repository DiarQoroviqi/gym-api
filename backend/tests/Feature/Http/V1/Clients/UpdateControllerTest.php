<?php

declare(strict_types=1);

use App\Permissions\Role;
use Domain\Contracting\Models\Client;
use Domain\Shared\Models\User;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can update a client as a receptionist', function () {
    $client = Client::factory()->create();

    $updatedClient = Client::factory()->make();

    $this->user->assignRole(Role::RECEPTIONIST);

    $this->actingAs($this->user)->putJson(route('api.v1.clients.update', $client->uuid), [
        'first_name' => $updatedClient->first_name,
        'last_name' => $updatedClient->last_name,
        'phone' => $updatedClient->phone,
        'comment' => $updatedClient->comment,
    ])->assertStatus(Response::HTTP_OK);

    expect($client->refresh())
        ->first_name->toBe($updatedClient->first_name)
        ->last_name->toBe($updatedClient->last_name)
        ->phone->toBe($updatedClient->phone)
        ->comment->toBe($updatedClient->comment);
});
