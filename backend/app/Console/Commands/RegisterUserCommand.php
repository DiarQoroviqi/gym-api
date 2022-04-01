<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Notifications\UserRegistered;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Password;
use Infrastructure\Shared\Actions\RegistersUser;
use Symfony\Component\Console\Command\Command as BaseCommand;

class RegisterUserCommand extends Command
{
    protected $signature = 'register:user {name?} {email?}';

    protected $description = 'Register user';

    public function handle(RegistersUser $registerUser): int
    {
        $user = $registerUser($this->data());

        $token = Password::createToken($user);

        $user->notify(new UserRegistered($token));

        $this->info('User has been registered.');

        return BaseCommand::SUCCESS;
    }

    private function data(): array
    {
        return [
            'name' => $this->argument('name') ?? $this->ask('What is the user\'s name?'),
            'email' => $this->argument('email') ?? $this->ask('What is the user\'s email?'),
            'email_verified_now' => now(),
        ];
    }
}
