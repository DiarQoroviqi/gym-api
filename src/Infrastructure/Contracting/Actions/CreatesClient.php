<?php

declare(strict_types=1);

namespace Infrastructure\Contracting\Actions;

use Domain\Contracting\DataTransferObjects\ClientData;
use Domain\Contracting\Models\Client;

interface CreatesClient
{
    public function __invoke(ClientData $object): Client;
}
