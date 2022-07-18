<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients\Contracts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Contract\StoreClientContractRequest;
use App\Http\Resources\Api\V1\ContractResource;
use Domain\Contracting\Models\Client;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class StoreController extends Controller
{
    public function __invoke(StoreClientContractRequest $request, Client $client): JsonResponse
    {
        return new JsonResponse(
            data: ContractResource::make($client->contract),
            status: Response::HTTP_OK
        );
    }
}
