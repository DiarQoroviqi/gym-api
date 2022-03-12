<?php

declare(strict_types=1);

namespace Domain\Contracting\Models;

use Database\Factories\ClientFactory;
use Deviar\LaravelQueryFilter\Filters\Filterable;
use Domain\Contracting\Models\Builders\ClientBuilder;
use Domain\Shared\Models\Concerns\HasUuid;
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

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'comment',
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
