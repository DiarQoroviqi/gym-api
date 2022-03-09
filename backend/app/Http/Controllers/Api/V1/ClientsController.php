<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetClientsRequest;
use App\Http\Resources\ClientResource;
use Domain\Contracting\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\QueryBuilder\QueryBuilder;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    public function index(GetClientsRequest $request): AnonymousResourceCollection
    {
        $clients = QueryBuilder::for(Client::class)
            ->allowedFilters(['first_name', 'last_name', 'phone', 'comment'])
            ->allowedIncludes(['contracts'])
            ->get();

        return ClientResource::collection($clients);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, Client $client)
    {
        dd($client, $c);
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
