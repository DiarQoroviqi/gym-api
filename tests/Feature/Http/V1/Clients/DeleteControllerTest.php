<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Clients\DeleteController;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\deleteJson;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    login();

    $this->client = Client::factory()->create();
});

it('can delete a client', function () {
    deleteJson(action(DeleteController::class, $this->client->uuid))
        ->assertStatus(Response::HTTP_NO_CONTENT);

    expect($this->client->refresh())
        ->deleted_at->not->toBeNull();
});

it('will delete client contract after deleting the client', function () {
    login();

    Contract::factory()
        ->for($this->client)
        ->create();

    deleteJson(action(DeleteController::class, $this->client->uuid));

    expect($this->client->refresh())
        ->deleted_at->not->toBeNull();

    assertDatabaseCount(Contract::class, 0);
});
