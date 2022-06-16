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

    $newClient = Client::factory()->make();

    $this->user->assignRole(Role::RECEPTIONIST);

    $this->actingAs($this->user)->putJson(route('api.v1.clients.update', $client->uuid), [
        'first_name' => $newClient->first_name,
        'last_name' => $newClient->last_name,
        'phone' => $newClient->phone,
        'comment' => $newClient->comment,
    ])->assertStatus(Response::HTTP_OK);

    expect($client->refresh())
        ->first_name->toBe($newClient->first_name)
        ->last_name->toBe($newClient->last_name)
        ->phone->toBe($newClient->phone)
        ->comment->toBe($newClient->comment);
});
