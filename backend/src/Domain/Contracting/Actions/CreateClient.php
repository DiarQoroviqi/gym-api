<?php

declare(strict_types=1);

namespace Domain\Contracting\Actions;

use Domain\Contracting\Models\Client;
use Domain\Contracting\ValueObjects\ClientValueObject;

class CreateClient
{
    public static function handle(ClientValueObject $object): Client
    {
        return Client::create($object->toArray());
    }
}
