<?php

declare(strict_types=1);

namespace Infrastructure\Contracting\Actions;

use Domain\Contracting\Models\Client;

interface DeletesClient
{
    public function handle(Client $client): ?bool;
}
