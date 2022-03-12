<?php

declare(strict_types=1);

namespace Domain\Contracting\Models;

use Database\Factories\PaymentFactory;
use Domain\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    use HasUuid;

    protected static function newFactory(): Factory
    {
        return new PaymentFactory();
    }
}
