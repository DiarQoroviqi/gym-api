<?php

declare(strict_types=1);

namespace Domain\Contracting\Actions;

use Domain\Contracting\DataTransferObjects\ClientContractData;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use Infrastructure\Contracting\Actions\CreatesClientContract;

class CreateClientContract implements CreatesClientContract
{
    public function __invoke(ClientContractData $data, Client $client): Contract
    {
        return $client->contract()->create($data->toArray());
    }
    
}
