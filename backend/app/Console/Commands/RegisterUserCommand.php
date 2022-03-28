<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Notifications\UserRegistered;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Password;
use Infrastructure\Shared\Actions\RegistersUser;

class RegisterUserCommand extends Command
{
    protected $signature = 'register:user';

    protected $description = 'Register user';

    public function __construct(protected RegistersUser $registerUser)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $user = $this->registerUser->handle([
            'name' => $this->ask('Name'),
            'email' => $this->ask('Email'),
            'email_verified_now' => now(),
        ]);

        $token = Password::createToken($user);

        $user->notify(new UserRegistered($token));

        $this->info('User has been registered.');

        return 0;
    }
}
