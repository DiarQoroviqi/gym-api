<?php

declare(strict_types=1);

namespace Domain\Shared\Actions;

use Domain\Shared\Models\User;
use Infrastructure\Shared\Actions\RegistersUser;

class RegisterUser implements RegistersUser
{
    public function __invoke(array $data): User
    {
        return User::create($data);
    }
}
