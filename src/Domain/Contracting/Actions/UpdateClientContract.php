<?php

declare(strict_types=1);

namespace Domain\Contracting\Actions;

use Domain\Contracting\DataTransferObjects\ClientContractData;
use Domain\Contracting\Models\Client;
use Domain\Contracting\Models\Contract;
use Infrastructure\Contracting\Actions\UpdatesClientContract;

class UpdateClientContract implements UpdatesClientContract
{

    public function __invoke(ClientContractData $data, Client $client): Contract
    {
        $client->contract->fill($data->toArray())->save();

        return $client->contract->refresh();
    }
}
