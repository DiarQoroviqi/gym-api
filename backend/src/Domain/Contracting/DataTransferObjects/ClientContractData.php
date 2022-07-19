<?php

declare(strict_types=1);

namespace Domain\Contracting\DataTransferObjects;

use App\Http\Requests\Api\V1\Contract\StoreClientContractRequest;
use Domain\Contracting\Enums\ContractTypes;
use Spatie\DataTransferObject\DataTransferObject;

class ClientContractData extends DataTransferObject
{
    public string|null $comment;

    public string $payed_at;

    public float $price;

    public string $started_at;

    public int $contract_type;

    public static function fromStoreRequest(StoreClientContractRequest $request): ClientContractData
    {
        return new self([
            'comment' => $request->input('comment'),
            'payed_at' => $request->input('payed_at'),
            'price' => (float) $request->input('price'),
            'started_at' => $request->input('started_at'),
            'contract_type' => ContractTypes::from($request->input('contract_type'))->value,
        ]);
    }
}
