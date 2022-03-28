<?php

declare(strict_types=1);

namespace App\Providers;

use Domain\Shared\Actions\RegisterUser;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Shared\Actions\RegistersUser;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegistersUser::class => RegisterUser::class,
    ];
}
