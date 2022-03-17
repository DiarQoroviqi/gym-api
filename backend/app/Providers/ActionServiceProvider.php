<?php

declare(strict_types=1);

namespace App\Providers;

use Domain\Shared\Actions\RegisterUser;
use Infrastructure\Shared\Actions\RegistersUser;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegistersUser::class => RegisterUser::class,
    ];
}
