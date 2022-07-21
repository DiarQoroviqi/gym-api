<?php

declare(strict_types=1);

namespace Infrastructure\Contracting\Actions;

use Domain\Contracting\DataTransferObjects\ClientContractData;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;

interface UpdatesClientContract
{
    public function __invoke(ClientContractData $data, Client $client): Contract;
}
