<?php

declare(strict_types=1);

namespace Domain\Contracting\Models;

use Database\Factories\ContractFactory;
use Domain\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'payed_at' => 'datetime',
        'price' => 'double',
        'started_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    protected static function newFactory(): Factory
    {
        return new ContractFactory();
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
