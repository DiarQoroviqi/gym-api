<?php

declare(strict_types=1);

namespace Domain\Contracting\Observers;

use Domain\Contracting\Models\Client;

class ClientObserver
{
    public function deleting(Client $client): void
    {
        $client->contract()->delete();
    }
}
