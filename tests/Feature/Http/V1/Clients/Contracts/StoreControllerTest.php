<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Clients\Contracts\StoreController;
use Domain\Contracting\DataTransferObjects\ClientContractData;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;
use Tests\Factories\ClientContractRequestDataFactory;

beforeEach(function () {
    login();

    $this->client = Client::factory()->create();
    $this->requestData = ClientContractRequestDataFactory::new();
});

it('will create new contract for a client', function () {
    $contractData = new ClientContractData($this->requestData->create());

    postJson(
        action(StoreController::class, $this->client->uuid),
        $contractData->toArray()
    )->assertOk();

    assertDatabaseCount(Contract::class, 1);

    assertDatabaseHas(Contract::class, [
        'price' => $contractData->price,
        'started_at' => $contractData->started_at,
        'contract_type' => $contractData->contract_type,
        'payed_at' => $contractData->payed_at,
        'comment' => $contractData->comment,
    ]);
});

it('validates the required fields', function () {
    postJson(
        action(StoreController::class, $this->client->uuid),
        []
    )->assertJsonValidationErrors([
        'payed_at',
        'comment',
        'price',
        'started_at',
        'contract_type',
    ]);
});

it('validates the date format of payed_at field', function () {
    $contractData = new ClientContractData(
        $this->requestData->withPayedAt('2022-01-01')->create()
    );

    postJson(
        action(StoreController::class, $this->client->uuid),
        $contractData->toArray()
    )->assertJsonValidationErrors([
        'payed_at' => 'The payed at does not match the format Y-m-d H:i:s.',
    ]);
});
