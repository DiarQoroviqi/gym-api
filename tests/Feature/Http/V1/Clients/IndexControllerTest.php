<?php

declare(strict_types=1);

use App\Permissions\Role;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use Domain\Shared\Models\User;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('can retrieve a list of clients for receptionist role', function () {
    Client::factory($count = 2)->create();
    $this->user->assignRole(Role::RECEPTIONIST);

    $response = $this->actingAs($this->user)->getJson(route('api.v1.clients.index'));

    expect($response->getContent())
        ->json()
        ->data->toHaveCount($count)
        ->meta->not()->toBeNull();
});

it('can retrieve a list of filtered clients', function () {
    $client1 = Client::factory()->create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'phone' => '11111111',
        'comment' => 'comment',
    ]);

    $client2 = Client::factory()->create([
        'first_name' => 'Jim',
        'last_name' => 'Jimmy',
        'phone' => '22222222',
        'comment' => null,
    ]);

    $this->user->assignRole(Role::RECEPTIONIST);

    $response = $this->actingAs($this->user)
        ->getJson(route('api.v1.clients.index', http_build_query([
            'filter[first_name]' => 'john',
        ])));

    expect($response->getContent())
        ->json()->data
        ->toHaveCount(1)
        ->each(
            fn ($client) => $client->first_name->toEqual($client1->first_name)
        );

    $response = $this->actingAs($this->user)
        ->getJson(route('api.v1.clients.index', http_build_query([
            'filter[phone]' => '22222222',
        ])));

    expect($response->getContent())
        ->json()->data
        ->toHaveCount(1)
        ->each(
            fn ($client) => $client->phone->toEqual($client2->phone)
        );
});

it('can retrieve a list of clients with contracts', function () {
    $client1 = Client::factory()->create();
    $contract1 = Contract::factory()->for($client1)->create();

    $client2 = Client::factory()->create();
    $contract2 = Contract::factory()->for($client2)->create();

    $this->user->assignRole(Role::RECEPTIONIST);

    $response = $this->actingAs($this->user)->getJson(
        route('api.v1.clients.index', http_build_query([
            'include' => 'contract',
        ]))
    )->assertOk();

    expect($response->getContent())
        ->json()
        ->meta->not->toBeNull()
        ->data->toHaveCount(2)
        ->each(
            fn ($client) => $client->contract->not->toBeNull()
        );
});

it('should return 401 for users without any role', function () {
    $this->actingAs($this->user)->getJson(route('api.v1.clients.index'))
        ->assertStatus(Response::HTTP_FORBIDDEN);
});

it('should return 401 without authentication token', function () {
    $this->getJson(route('api.v1.clients.index'))
        ->assertStatus(401)
        ->assertJson([
            'message' => 'Unauthenticated.',
        ]);
});
