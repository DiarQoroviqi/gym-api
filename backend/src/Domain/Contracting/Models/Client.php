<?php

namespace Domain\Contracting\Models;

use Domain\Contracting\Models\Builders\ClientBuilder;
use Domain\Shared\Models\Concerns\HasUuid;
use Database\Factories\ClientFactory;
use Domain\Contracting\Models\Contract;
use Deviar\LaravelQueryFilter\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    use Filterable;
    use HasUuid;

    public $casts = [
        'created_at' => 'datetime',
    ];

    protected static function newFactory(): Factory
    {
        return new ClientFactory();
    }

    public function newEloquentBuilder($query): ClientBuilder
    {
        return new ClientBuilder($query);
    }

        public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'client_id');
    }
}
