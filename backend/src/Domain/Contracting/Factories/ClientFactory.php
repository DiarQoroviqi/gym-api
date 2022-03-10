<?php

declare(strict_types=1);

namespace Domain\Contracting\Factories;

use Domain\Contracting\ValueObjects\ClientValueObject;

class ClientFactory
{
    public static function create(array $attributes): ClientValueObject
    {
        return new ClientValueObject(
            firstName: $attributes['first_name'],
            lastName: $attributes['last_name'],
            phone: $attributes['phone'],
            comment: $attributes['comment'],
        );
    }
}
