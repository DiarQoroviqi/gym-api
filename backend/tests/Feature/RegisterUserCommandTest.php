<?php

declare(strict_types=1);

use App\Notifications\UserRegistered;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Notification;

it('can register user and send notification', function () {
    Notification::fake();

    $command = $this->artisan('register:user')
        ->expectsQuestion('Name', 'John')
        ->expectsQuestion('Email', 'john@example.com');

    $command->assertSuccessful()->run();

    Notification::assertSentTo(User::first(), UserRegistered::class);
});
