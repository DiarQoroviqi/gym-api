<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Domain\Contracting\Models\Contract;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Contract
 */
class ContractResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'type' => 'contract',
            'id' => $this->uuid,
            'payed_at' => $this->payed_at->toDateTimeString(),
            'price' => $this->price,
            'contract_type' => $this->contract_type,
            'started_at' => $this->started_at->toDateTimeString(),
            'expired_at' => $this->expired_at->toDateTimeString(),
            'comment' => $this->comment,
            'links' => [
                'self' => route('api.v1.clients.contract.show', $this->client),
            ],
        ];
    }
}
