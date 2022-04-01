<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\StoreClientRequest;
use App\Http\Resources\Api\V1\ClientResource;
use Domain\Contracting\Factories\ClientFactory;
use Illuminate\Http\JsonResponse;
use Infrastructure\Contracting\Actions\CreatesClient;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    public function __invoke(StoreClientRequest $request, CreatesClient $createClient): JsonResponse
    {
        $client = $createClient(ClientFactory::create($request->validated()));

        return response()->json(
            ClientResource::make($client),
            Response::HTTP_CREATED
        );
    }
}
