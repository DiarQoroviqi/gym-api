<?php

declare(strict_types=1);

use Domain\Contracting\Actions\CreateClient;
use Domain\Contracting\DataTransferObjects\ClientData;
use Domain\Contracting\Models\Client;

it('creates client', function () {
    $action = app(CreateClient::class);

    $client = Client::factory()->make();

    $clientData = new ClientData([
        'first_name' => $client->first_name,
        'last_name' => $client->last_name,
        'phone' => $client->phone,
        'comment' => $client->comment,
    ]);

    $createdClient = $action($clientData);

    expect($createdClient->refresh())
        ->first_name->toBe($client->first_name)
        ->last_name->toBe($client->last_name)
        ->phone->toBe($client->phone)
        ->comment->toBe($client->comment);
});
