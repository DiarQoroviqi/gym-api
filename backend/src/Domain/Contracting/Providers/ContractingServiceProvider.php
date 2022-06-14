<?php

declare(strict_types=1);

namespace Domain\Contracting\Providers;

use Domain\Contracting\Actions\CreateClient;
use Domain\Contracting\Actions\DeleteClient;
use Domain\Contracting\Factories\ClientFactory;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Contracting\Actions\CreatesClient;
use Infrastructure\Contracting\Actions\DeletesClient;
use Infrastructure\Contracting\Factories\ClientFactoryContract;

class ContractingServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreatesClient::class => CreateClient::class,
        DeletesClient::class => DeleteClient::class,

        // Factory
        ClientFactoryContract::class => ClientFactory::class,
    ];
}
