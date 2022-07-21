<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients\Contracts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Contract\StoreClientContractRequest;
use App\Http\Resources\Api\V1\ClientResource;
use Domain\Contracting\DataTransferObjects\ClientContractData;
use Domain\Contracting\Models\Client;
use Illuminate\Http\JsonResponse;
use Infrastructure\Contracting\Actions\UpdatesClientContract;
use Symfony\Component\HttpFoundation\Response;

class UpdateController extends Controller
{
    public function __invoke(
        StoreClientContractRequest $request,
        Client $client,
        UpdatesClientContract $action
    ): JsonResponse
    {
        $action(
            ClientContractData::fromStoreRequest($request),
            $client
        );

        return new JsonResponse(
            data: ClientResource::make($client->load('contract')),
            status: Response::HTTP_OK
        );
    }
}
