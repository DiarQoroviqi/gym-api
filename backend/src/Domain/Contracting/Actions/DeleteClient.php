<?php

declare(strict_types=1);

namespace Domain\Contracting\Actions;

use Domain\Contracting\Models\Client;
use Infrastructure\Contracting\Actions\DeletesClient;

class DeleteClient implements DeletesClient
{
    public function __invoke(Client $client): ?bool
    {
        return $client->delete();
    }
}
