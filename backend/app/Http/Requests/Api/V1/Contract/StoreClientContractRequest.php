<?php

declare(strict_types=1);

namespace App\Http\Requests\Api\V1\Contract;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreClientContractRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client' => [
                'required',
                'string',
                Rule::exists('clients', 'uuid'),
            ],
            'comment' => [
                'nullable',
                'present',
                'string',
            ],
        ];
    }
}
