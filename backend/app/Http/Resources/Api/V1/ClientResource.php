<?php

declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->uuid,
            'type' => 'client',
            'attributes' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'comment' => $this->comment,
                'created_at' => $this->created_at->toDateTimeString(),
                'updated_at' => $this->updated_at->toDateTimeString(),
            ],
            'relationships' => [
                'contract' => ContractResource::make($this->whenLoaded('contract')),
            ],
            'links' => [
                'self' => route('api.v1.clients.show', $this->uuid),
                'parent' => route('api.v1.clients.index'),
                'contract' => null,
            ],
        ];
    }
}
