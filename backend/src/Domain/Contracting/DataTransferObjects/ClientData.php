<?php

declare(strict_types=1);

namespace Domain\Contracting\DataTransferObjects;

use App\Http\Requests\Api\V1\Client\StoreClientRequest;
use Spatie\DataTransferObject\DataTransferObject;

final class ClientData extends DataTransferObject
{
    public string $first_name;

    public string $last_name;

    public null|string $phone;

    public null|string $comment;

    public static function fromStoreRequest(StoreClientRequest $request): ClientData
    {
        return new self([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'comment' => $request->input('comment'),
        ]);
    }
}
