<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Clients\Contracts\ShowController;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use function Pest\Laravel\getJson;

it('can show a client contract', function () {
    login();

    $client = Client::factory()->create();
    $contract = Contract::factory()
        ->for($client)
        ->create();

    getJson(action(ShowController::class, $client->uuid))
        ->assertSuccessful()
        ->assertJsonPath('type', 'contract')
        ->assertJsonPath('id', $contract->uuid)
        ->assertJsonPath('links.self', action(ShowController::class, $client->uuid));
});
