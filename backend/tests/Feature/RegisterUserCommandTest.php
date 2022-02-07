<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\UserRegistered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class RegisterUserCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_registered(): void
    {
        Notification::fake();

        $this->artisan('register:user')
            ->expectsQuestion('Name', 'John')
            ->expectsQuestion('Email', 'john@example.com')
            ->assertExitCode(0);

        Notification::assertSentTo(User::first(), UserRegistered::class);
    }
}
