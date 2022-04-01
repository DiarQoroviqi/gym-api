<?php

declare(strict_types=1);

use Domain\Contracting\Actions\CreateClient;
use Domain\Contracting\ValueObjects\ClientValueObject;

it('can create client', function() {
    $action = app(CreateClient::class);

    $clientValueObject = new ClientValueObject(
        'John',
        'Doe',
        '+383123456789',
        'comment',
    );

    $createdClient = $action($clientValueObject);

    expect($createdClient->refresh())
        ->first_name->toBe('John')
        ->last_name->toBe('Doe')
        ->phone->toBe('+383123456789')
        ->comment->toBe('comment');
});
