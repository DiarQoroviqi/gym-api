<?php

declare(strict_types=1);

namespace Infrastructure\Contracting\Actions;

use Domain\Contracting\DataTransferObjects\ClientData;
use Domain\Contracting\Models\Client;

interface UpdatesClient
{
    public function __invoke(Client $client, ClientData $object): Client;
}
