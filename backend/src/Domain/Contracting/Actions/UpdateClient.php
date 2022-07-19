<?php

declare(strict_types=1);

namespace Domain\Contracting\Actions;

use Domain\Contracting\DataTransferObjects\ClientData;
use Domain\Contracting\Models\Client;
use Infrastructure\Contracting\Actions\UpdatesClient;

class UpdateClient implements UpdatesClient
{
    public function __invoke(Client $client, ClientData $object): Client
    {
        $client->fill($object->toArray())->save();

        return $client->refresh();
    }
}
