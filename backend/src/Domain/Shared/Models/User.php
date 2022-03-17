<?php

declare(strict_types=1);

namespace Domain\Shared\Models;

use Database\Factories\UserFactory;
use Domain\Shared\Models\Builders\UserBuilder;
use Domain\Shared\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasUuid;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function newFactory(): Factory
    {
        return new UserFactory();
    }

    public function newEloquentBuilder($query): UserBuilder
    {
        return new UserBuilder($query);
    }
}
