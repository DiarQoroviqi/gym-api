<?php

declare(strict_types=1);

namespace Domain\Contracting\Providers;

use Domain\Contracting\Actions\CreateClient;
use Domain\Contracting\Actions\DeleteClient;
use Domain\Contracting\Actions\UpdateClient;
use Domain\Contracting\Factories\ClientFactory;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Contracting\Actions\CreatesClient;
use Infrastructure\Contracting\Actions\DeletesClient;
use Infrastructure\Contracting\Actions\UpdatesClient;
use Infrastructure\Contracting\Factories\ClientFactoryContract;

class ContractingServiceProvider extends ServiceProvider
{
    public array $bindings = [
        // Actions
        CreatesClient::class => CreateClient::class,
        DeletesClient::class => DeleteClient::class,
        UpdatesClient::class => UpdateClient::class,

        // Factories
        ClientFactoryContract::class => ClientFactory::class,
    ];
}
