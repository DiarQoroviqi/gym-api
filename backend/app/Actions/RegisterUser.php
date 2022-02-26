<?php

namespace App\Actions;

use App\Contracts\Actions\RegistersUser;
use App\Models\User;

class RegisterUser implements RegistersUser
{
    public function handle(array $data): User
    {
        return User::create($data);
    }
}
