<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'payment_date' => $this->payment_date->toDateString(),
            'price' => $this->price,
            'from_date' => $this->from_date->toDateString(),
            'to_date' => $this->to_date->toDateString(),
        ];
    }
}
