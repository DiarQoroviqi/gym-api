<?php

declare(strict_types=1);

use App\Notifications\UserRegistered;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Notification;
use Infrastructure\Shared\Actions\RegistersUser;

it('can register a user', function () {
    Notification::fake();

    $command = $this->artisan('register:user', [
        'name' => 'John Doe',
        'email' => 'jon@doe.com',
    ]);

    $command->assertSuccessful()->run();

    Notification::assertSentTo(User::first(), UserRegistered::class);
})->shouldHaveCalledAction(RegistersUser::class);
