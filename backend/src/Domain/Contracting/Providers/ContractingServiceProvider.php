<?php

declare(strict_types=1);

namespace Domain\Contracting\Providers;

use Domain\Contracting\Actions\CreateClient;
use Domain\Contracting\Actions\DeleteClient;
use Illuminate\Support\ServiceProvider;
use Infrastructure\Contracting\Actions\CreatesClient;
use Infrastructure\Contracting\Actions\DeletesClient;

class ContractingServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreatesClient::class => CreateClient::class,
        DeletesClient::class => DeleteClient::class,
    ];
}
