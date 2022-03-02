<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'first_name' => $this->first_name,
            'last_name' => $this->first_name,
            'phone' => $this->first_name,
            'comment' => $this->first_name,
            'created_at' => $this->created_at->toDateString(),
        ];
    }
}
