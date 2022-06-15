<?php

declare(strict_types=1);

namespace Infrastructure\Contracting\Actions;

use Domain\Contracting\Models\Client;
use Domain\Contracting\ValueObjects\ClientValueObject;

interface UpdatesClient
{
    public function __invoke(Client $client, ClientValueObject $object): Client;
}
