<?php

declare(strict_types=1);

use App\Notifications\UserRegistered;
use Domain\Shared\Models\User;
use Illuminate\Support\Facades\Notification;
use Infrastructure\Shared\Actions\RegistersUser;

it('can register a user with register:user command', function () {
    Notification::fake();

    $command = $this->artisan('register:user', [
        'name' => 'John Doe',
        'email' => 'john@doe.com',
    ]);

    $command->assertSuccessful()->run();

    Notification::assertSentTo(User::where('email', 'john@doe.com')->get(), UserRegistered::class);
})->shouldHaveCalledAction(RegistersUser::class);
