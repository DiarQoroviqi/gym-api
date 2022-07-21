<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Clients\Contracts\UpdateController;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use function Pest\Laravel\patchJson;
use Tests\Factories\ClientContractRequestDataFactory;

beforeEach(function () {
    login();

    $this->client = Client::factory()->create();
    $this->contract = Contract::factory()
        ->for($this->client)->create();

    $this->requestData = ClientContractRequestDataFactory::new();
});

it('will update a client contract', function () {
    $requestData = $this->requestData->create();
    
    patchJson(
        action(UpdateController::class, $this->client->uuid),
        $requestData
    )->assertSuccessful();

    $updatedContract = $this->contract->refresh();

    expect($updatedContract)
        ->comment->toBe($requestData['comment'])
        ->payed_at->format('Y-m-d H:i:s')->toBe($requestData['payed_at'])
        ->started_at->format('Y-m-d')->toBe($requestData['started_at'])
        ->price->toBe($requestData['price'])
        ->contract_type->toBe($requestData['contract_type']);
});
