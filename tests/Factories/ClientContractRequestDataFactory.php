<?php

declare(strict_types=1);

namespace Tests\Factories;

use Carbon\Carbon;

class ClientContractRequestDataFactory
{
    protected string $comment = 'Comment';

    protected string $payedAt = '2022-01-01 00:00:00';

    protected string $startedAt = '2022-01-01';

    protected int $contractType = 3;

    protected float $price = 30.0;

    public static function new(): self
    {
        return new self();
    }

    public function create(array $extra = []): array
    {
        return $extra + [
            'comment' => $this->comment,
            'payed_at' => $this->payedAt,
            'started_at' => $this->startedAt,
            'contract_type' => $this->contractType,
            'price' => $this->price,
        ];
    }

    public function withPayedAt(string|Carbon $payedAt): self
    {
        $this->payedAt = $payedAt instanceof Carbon
            ? $payedAt->format('Y-m-d')
            : $payedAt;

        return $this;
    }
}
