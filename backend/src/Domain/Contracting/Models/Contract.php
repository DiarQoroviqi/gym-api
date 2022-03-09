<?php

namespace Domain\Contracting\Models;

use Domain\Shared\Models\Concerns\HasUuid;
use Database\Factories\ContractFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;
    use HasUuid;

    protected $casts = [
        'payment_date' => 'datetime',
        'price' => 'double',
        'from_date' => 'datetime',
        'to_date' => 'datetime',
    ];

    protected static function newFactory(): Factory
    {
        return new ContractFactory();
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class,'client_id');
    }
}
