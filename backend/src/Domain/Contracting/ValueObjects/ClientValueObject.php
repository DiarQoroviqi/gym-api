<?php

declare(strict_types=1);

namespace Domain\Contracting\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;

final class ClientValueObject implements Arrayable
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly null|string $phone,
        public readonly null|string $comment,
    ) {
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'phone' => $this->phone,
            'comment' => $this->comment,
        ];
    }
}
