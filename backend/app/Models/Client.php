<?php

namespace App\Models;

use App\Models\Concerns\HasUuid;
use Deviar\LaravelQueryFilter\Filters\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    use Filterable;
    use HasUuid;

    public $casts = [
        'created_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
