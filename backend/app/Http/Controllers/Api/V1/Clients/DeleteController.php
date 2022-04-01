<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients;

use App\Http\Controllers\Controller;
use Domain\Contracting\Models\Client;
use Illuminate\Http\Response;
use Infrastructure\Contracting\Actions\DeletesClient;

class DeleteController extends Controller
{
    public function __invoke(Client $client, DeletesClient $action): Response
    {
        $action->handle($client);

        return response()->noContent();
    }
}
