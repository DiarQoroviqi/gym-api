<?php

declare(strict_types=1);

namespace App\Http\Resources;

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
                'created_at' => $this->created_at->toDateString(),
            ],
            'relationships' => [
                'contacts' => ContractResource::collection($this->whenLoaded('contracts')),
            ],
            'links' => [
                'self' => route('api.v1.clients.show', $this->uuid),
                'parent' => route('api.v1.clients.index'),
            ],
        ];
    }
}
