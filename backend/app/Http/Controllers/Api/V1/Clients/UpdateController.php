<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\StoreClientRequest;
use App\Http\Resources\Api\V1\ClientResource;
use Domain\Contracting\Factories\ClientFactory;
use Domain\Contracting\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Infrastructure\Contracting\Actions\CreatesClient;
use Infrastructure\Contracting\Actions\UpdatesClient;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    public function __invoke(
        Client $client,
        StoreClientRequest $request,
        UpdatesClient $action,
        ClientFactory $factory
    ): JsonResponse {
        $client = $action($client, $factory->make($request->validated()));

        return response()->json(
            ClientResource::make($client),
            Response::HTTP_OK
        );
    }
}
