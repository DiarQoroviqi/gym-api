<?php

declare(strict_types=1);

namespace Domain\Contracting\Actions;

use Domain\Contracting\Models\Client;
use Domain\Contracting\ValueObjects\ClientValueObject;
use Infrastructure\Contracting\Actions\UpdatesClient;

class UpdateClient implements UpdatesClient
{
    public function __invoke(Client $client, ClientValueObject $object): Client
    {
        $client->fill($object->toArray())->save();

        return $client->refresh();
    }
}
