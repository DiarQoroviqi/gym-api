<?php

declare(strict_types=1);

use Domain\Contracting\Actions\CreateClient;
use Domain\Contracting\Models\Client;
use Domain\Contracting\ValueObjects\ClientValueObject;

it('creates client', function () {
    $action = app(CreateClient::class);

    $client = Client::factory()->make();

    $clientValueObject = new ClientValueObject(
        $client->first_name,
        $client->last_name,
        $client->phone,
        $client->comment,
    );

    $createdClient = $action($clientValueObject);

    expect($createdClient->refresh())
        ->first_name->toBe($client->first_name)
        ->last_name->toBe($client->last_name)
        ->phone->toBe($client->phone)
        ->comment->toBe($client->comment);
});
