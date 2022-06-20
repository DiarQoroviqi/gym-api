<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'payed_at' => $this->payed_at->toDateString(),
            'price' => $this->price,
            'started_at' => $this->started_at->toDateString(),
            'expired_at' => $this->expired_at->toDateString(),
        ];
    }
}
