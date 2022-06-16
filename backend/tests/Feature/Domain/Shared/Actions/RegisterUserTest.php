<?php

declare(strict_types=1);

use Domain\Shared\Actions\RegisterUser;

it('registers user', function () {
    $action = app(RegisterUser::class);

    $user = $action([
        'name' => 'John Doe',
        'email' => 'foo@bar.com',
    ]);

    expect($user->refresh())
        ->name->toBe('John Doe')
        ->email->toBe('foo@bar.com');
});
