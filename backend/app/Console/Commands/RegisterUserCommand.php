<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\UserRegistered;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class RegisterUserCommand extends Command
{
    protected $signature = 'register:user';

    protected $description = 'Register user';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $password = Str::random(10);

        $user = User::create([
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
