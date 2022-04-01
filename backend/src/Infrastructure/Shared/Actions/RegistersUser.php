<?php

declare(strict_types=1);

namespace Infrastructure\Shared\Actions;

use Domain\Shared\Models\User;

interface RegistersUser
{
    public function __invoke(array $data): User;
}
