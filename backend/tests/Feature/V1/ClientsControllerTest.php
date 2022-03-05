<?php

use App\Models\Client;
use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('should return clients', function () {
    $client = Client::factory()->create();
    $client2 = Client::factory()->create();


    $this->actingAs($this->user)->get('/api/v1/clients')
        ->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 2)
                ->where('data.0.id', $client->uuid)
                ->where('data.0.attributes.first_name', $client->first_name)
                ->where('data.1.id', $client2->uuid)
                ->where('data.1.attributes.first_name', $client2->first_name)
                ->etc()
        );
});

it('should filter clients with filters', function () {
    $client = Client::factory()->create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'phone' => '11111111',
        'comment' => 'comment'
    ]);

    $client2 = Client::factory()->create([
        'first_name' => 'Jim',
        'last_name' => 'Jimmy',
        'phone' => '22222222',
        'comment' => null,
    ]);

    $this->actingAs($this->user)->get('/api/v1/clients?'. http_build_query([
        'filter[first_name]' => 'john',
        'filter[last_name]' => 'doe',
    ]))
        ->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 1)
                ->where('data.0.id', $client->uuid)
                ->where('data.0.attributes.first_name', $client->first_name)
                ->etc()
        );

    $this->actingAs($this->user)->get('/api/v1/clients?'. http_build_query([
            'filter[phone]' => '22222222',
    ]))
        ->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
        $json->has('data', 1)
            ->where('data.0.id', $client2->uuid)
            ->where('data.0.attributes.first_name', $client2->first_name)
            ->etc()
        );
});

it('should return 401 without authentication token', function () {
    $this->getJson('/api/v1/clients')
        ->assertStatus(401)
        ->assertJson([
            'message' => 'Unauthenticated.'
        ]);
});
