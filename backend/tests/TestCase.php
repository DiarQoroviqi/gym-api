<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function shouldHaveCalledAction(string $action): void
    {
        $original = $this->app->make($action);

        $this->mock($action)
            ->shouldReceive('__invoke')
            ->atLeast()->once()
            ->andReturnUsing(fn(...$args) => $original(...$args));
    }
}
