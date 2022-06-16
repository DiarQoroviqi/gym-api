<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Clients;

use App\Http\Controllers\Controller;
use Domain\Contracting\Models\Client;
use Illuminate\Http\Response;
use Infrastructure\Contracting\Actions\DeletesClient;

class DeleteController extends Controller
{
    public function __construct(public readonly DeletesClient $action)
    {
    }

    public function __invoke(Client $client): Response
    {
        $this->action->handle($client);

        return response()->noContent();
    }
}
