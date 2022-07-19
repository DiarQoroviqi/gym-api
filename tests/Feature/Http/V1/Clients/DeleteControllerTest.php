<?php

declare(strict_types=1);

use App\Permissions\Role;
use Domain\Contracting\Models\Client;
use Domain\Shared\Models\User;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can delete a client as a super-admin', function () {
    $client = Client::factory()->create();

    $this->user->assignRole(Role::SUPER_ADMIN);

    $this->actingAs($this->user)->delete(route('api.v1.clients.delete', $client->uuid))
        ->assertStatus(Response::HTTP_NO_CONTENT);

    expect($client->refresh())
        ->deleted_at->not->toBeNull();
});

it('can delete a client as a receptionist', function () {
    $client = Client::factory()->create();

    $this->user->assignRole(Role::RECEPTIONIST);

    $this->actingAs($this->user)->delete(route('api.v1.clients.delete', $client->uuid))
        ->assertStatus(Response::HTTP_NO_CONTENT);

    expect($client->refresh())
        ->deleted_at->not->toBeNull();
});