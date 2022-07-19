<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesApplication;
use Tests\TestCase;

uses(TestCase::class, CreatesApplication::class, RefreshDatabase::class)
    ->in('Unit', 'Feature');
