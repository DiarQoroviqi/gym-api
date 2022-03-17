<?php

namespace Infrastructure\Contracting\Actions;

use Domain\Contracting\Models\Client;
use Domain\Contracting\ValueObjects\ClientValueObject;

interface CreatesClient
{
    public function handle(ClientValueObject $object): Client;
}
