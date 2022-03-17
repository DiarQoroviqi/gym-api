<?php

namespace Domain\Contracting\Providers;

use Domain\Contracting\Actions\CreateClient;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Contracting\Actions\CreatesClient;

class ContractingServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreatesClient::class => CreateClient::class,
    ];
}
