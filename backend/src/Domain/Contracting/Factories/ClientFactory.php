<?php

declare(strict_types=1);

namespace Domain\Contracting\Factories;

use Domain\Contracting\ValueObjects\ClientValueObject;
use Infrastructure\Contracting\Factories\ClientFactoryContract;

final class ClientFactory implements ClientFactoryContract
{
    public function make(array $attributes): ClientValueObject
    {
        return new ClientValueObject(
            $attributes['first_name'],
            $attributes['last_name'],
            $attributes['phone'],
            $attributes['comment'],
        );
    }
}
