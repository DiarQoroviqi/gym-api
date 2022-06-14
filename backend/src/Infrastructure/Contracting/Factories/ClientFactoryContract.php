<?php

declare(strict_types=1);

namespace Infrastructure\Contracting\Factories;

use Domain\Contracting\ValueObjects\ClientValueObject;

interface ClientFactoryContract
{
    public function make(array $attributes): ClientValueObject;
}
