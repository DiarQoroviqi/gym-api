<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Clients\Contracts\StoreController;
use Domain\Contracting\DataTransferObjects\ClientContractData;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

beforeEach(function () {
    login();
});

it('will create new contract for a client', function () {
    $client = Client::factory()->create();
    $contract = Contract::factory()->make();

    $contractData = new ClientContractData([
        'comment' => $contract->comment,
        'payed_at' => $contract->payed_at,
        'started_at' => $contract->started_at,
        'contract_type' => $contract->contract_type,
        'price' => $contract->price,
    ]);

    postJson(
        action(StoreController::class, $client->uuid),
        $contractData->toArray()
    )->assertOk();

    assertDatabaseCount(Contract::class, 1);

    assertDatabaseHas(Contract::class, [
        'price' => $contract->price,
        'started_at' => $contract->started_at,
        'contract_type' => $contract->contract_type,
        'payed_at' => $contract->payed_at,
        'comment' => $contract->comment,
    ]);
});
