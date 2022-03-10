<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Client\StoreClientRequest;
use App\Http\Requests\Api\V1\Client\GetClientsRequest;
use App\Http\Resources\Api\V1\ClientResource;
use Domain\Contracting\Actions\CreateClient;
use Domain\Contracting\Factories\ClientFactory;
use Domain\Contracting\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    public function index(GetClientsRequest $request): JsonResponse
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

    public function store(StoreClientRequest $request): JsonResponse
    {
        $client = CreateClient::handle(
            object: ClientFactory::create($request->validated())
        );

        return response()->json(
            data: ClientResource::make($client),
            status: Response::HTTP_CREATED
        );
    }

    public function show(Request $request, Client $client)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request, Client $client): JsonResponse
    {
        dd($client);
        return response()->noContent();
    }
}
