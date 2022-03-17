<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\GetClientsRequest;
use App\Http\Resources\Api\V1\ClientResource;
use Domain\Contracting\Models\Client;
use Illuminate\Http\JsonResponse;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    public function __invoke(GetClientsRequest $request): JsonResponse
    {
        $clients = QueryBuilder::for(Client::class)
            ->allowedFilters(['first_name', 'last_name', 'phone', 'comment'])
            ->allowedIncludes(['contracts'])
            ->paginate(config('app.pagination.per_page'));

        return response()->json(
            data: ClientResource::collection($clients),
            status: Response::HTTP_OK
        );
    }
}