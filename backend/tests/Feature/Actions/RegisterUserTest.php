<?php

use App\Actions\RegisterUser;

it('can register a user', function () {
    $action = app(RegisterUser::class);

    $user = $action->handle([
        'name' => 'John Doe',
        'email' => 'foo@bar.com',
    ]);

    expect($user->refresh())
        ->name->toBe('John Doe')
        ->email->toBe('foo@bar.com');
});
