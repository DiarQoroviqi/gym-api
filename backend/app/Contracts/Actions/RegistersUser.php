<?php

namespace App\Contracts\Actions;

use App\Models\User;

interface RegistersUser
{
    public function handle(array $data): User;
}
