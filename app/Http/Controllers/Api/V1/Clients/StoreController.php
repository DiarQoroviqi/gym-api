<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\StoreClientRequest;
use App\Http\Resources\Api\V1\ClientResource;
use Domain\Contracting\DataTransferObjects\ClientData;
use Illuminate\Http\JsonResponse;
use Infrastructure\Contracting\Actions\CreatesClient;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    public function __invoke(StoreClientRequest $request, CreatesClient $action): JsonResponse
    {
        $client = $action(ClientData::fromStoreRequest($request));

        return response()->json(
            data: ClientResource::make($client),
            status: Response::HTTP_CREATED
        );
    }
}
