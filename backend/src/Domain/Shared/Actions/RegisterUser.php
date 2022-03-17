<?php

declare(strict_types=1);

namespace Domain\Shared\Actions;

use Infrastructure\Shared\Actions\RegistersUser;
use Domain\Shared\Models\User;

class RegisterUser implements RegistersUser
{
    public function handle(array $data): User
    {
        return User::create($data);
    }
}
