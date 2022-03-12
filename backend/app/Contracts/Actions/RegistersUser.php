<?php

declare(strict_types=1);

namespace App\Contracts\Actions;

use Domain\Shared\Models\User;

interface RegistersUser
{
    public function handle(array $data): User;
}
