<?php

declare(strict_types=1);

use Domain\Contracting\Models\Contract;
use function Spatie\PestPluginTestTime\testTime;

it('verifies if contract is active', function () {
    testTime()->freeze();

    $contract = Contract::withoutEvents(function () {
        return Contract::factory()->create([
            'expired_at' => now(),
        ]);
    });

    testTime()->addSecond();

    expect($contract->isActive())
        ->toBeFalse();

    $contract = Contract::withoutEvents(function () {
        return Contract::factory()->create([
            'expired_at' => now(),
        ]);
    });

    testTime()->subSecond();

    expect($contract->isActive())
        ->toBeTrue();
});
