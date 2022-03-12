<?php

declare(strict_types=1);

namespace App\Actions;

use App\Contracts\Actions\RegistersUser;
use Domain\Shared\Models\User;

class RegisterUser implements RegistersUser
{
    public function handle(array $data): User
    {
        return User::create($data);
    }
}
