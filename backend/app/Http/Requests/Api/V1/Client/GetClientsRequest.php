<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Client;

use Illuminate\Foundation\Http\FormRequest;

class GetClientsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'filter' => ['nullable', 'sometimes', 'array'],
            'filter.first_name' => ['nullable', 'sometimes', 'string'],
            'filter.last_title' => ['nullable', 'sometimes', 'string'],
            'filter.phone' => ['nullable', 'sometimes', 'string'],
            'filter.contract.from_date' => ['nullable', 'sometimes', 'string'],
            'filter.contract.to_date' => ['nullable', 'sometimes', 'string'],
        ];
    }
}
