<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\StoreClientRequest;
use App\Http\Resources\Api\V1\ClientResource;
use Domain\Contracting\DataTransferObjects\ClientData;
use Domain\Contracting\Models\Client;
use Illuminate\Http\JsonResponse;
use Infrastructure\Contracting\Actions\UpdatesClient;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    public function __invoke(StoreClientRequest $request, Client $client, UpdatesClient $action): JsonResponse
    {
        $client = $action(
            $client,
            ClientData::fromStoreRequest($request)
        );

        return response()->json(
            data: ClientResource::make($client),
            status: Response::HTTP_OK
        );
    }
}
