<?php

declare(strict_types=1);

namespace Domain\Shared\Models\Concerns;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        static::creating(function (Model $model) {
            $model->uuid = Uuid::uuid4()->toString();
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
