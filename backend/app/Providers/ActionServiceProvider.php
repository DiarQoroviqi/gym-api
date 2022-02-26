<?php

declare(strict_types=1);

namespace App\Providers;

use App\Actions\RegisterUser;
use App\Contracts\Actions\RegistersUser;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    public array $bindings = [
        RegistersUser::class => RegisterUser::class,
    ];
}
