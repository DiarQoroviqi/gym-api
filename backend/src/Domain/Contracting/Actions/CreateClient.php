<?php

declare(strict_types=1);

namespace Domain\Contracting\Actions;

use Domain\Contracting\DataTransferObjects\ClientData;
use Domain\Contracting\Models\Client;
use Infrastructure\Contracting\Actions\CreatesClient;

class CreateClient implements CreatesClient
{
    public function __invoke(ClientData $data): Client
    {
        return Client::create($data->toArray());
    }
}
