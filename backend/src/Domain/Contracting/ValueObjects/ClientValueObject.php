<?php

declare(strict_types=1);

namespace Domain\Contracting\ValueObjects;

class ClientValueObject
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public null|string $phone,
        public null|string $comment,
    ){}

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
