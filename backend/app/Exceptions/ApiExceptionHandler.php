<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ApiExceptionHandler
{
    private string $message = '';

    private int $line;

    private int $statusCode = 500;

    private bool $success = false;

    const DEFAULT_401_MESSAGE = 'Unauthenticated.';

    const DEFAULT_403_MESSAGE = 'Forbidden.';

    const DEFAULT_404_MESSAGE = 'Page Not Found.';

    const DEFAULT_405_MESSAGE = 'Method Not Allowed.';

    const DEFAULT_500_MESSAGE = 'Whoops, looks like something went wrong.';

    const DEFAULT_503_MESSAGE = 'The server is currently unable to handle the request due to a temporary overloading or maintenance of the server.';

    public function __construct(private Exception $exception)
    {
    }

    public static function unauthenticated(): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'message' => self::DEFAULT_401_MESSAGE,
                'status' => 401,
            ], 401);
    }

    public static function validationException(ValidationException $e): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'message' => $e->getMessage(),
                'errors' => $e->errors(),
                'status' => 422,
            ], 422);
    }

    public function create(): self
    {
        $this->statusCode = $this->statusCode();
        $this->message = $this->message();
        $this->line = $this->exception->getLine();

        return $this;
    }

    public function response(): JsonResponse
    {
        $data = [
            'success' => $this->success,
            'message' => $this->message,
            'status' => $this->statusCode,
        ];

        if (! config('app.debug')) {
            return response()->json($data, $this->statusCode);
        }

        return response()->json(
            $data + [
                'line' => $this->line,
                'trace' => $this->exception->getTrace(),
                'file' => $this->exception->getFile(),
                'exception' => $this->exception,
            ],
            $this->statusCode
        );
    }

    private function statusCode(): int
    {
        if (! method_exists($this->exception, 'getStatusCode')) {
            return $this->statusCode;
        }

        return $this->exception->getStatusCode();
    }

    private function message(): string
    {
        return match ($this->statusCode) {
            403 => strlen($this->exception->getMessage()) ? $this->exception->getMessage() : self::DEFAULT_403_MESSAGE,
            404 => strlen($this->exception->getMessage()) ? $this->exception->getMessage() : self::DEFAULT_404_MESSAGE,
            405 => strlen($this->exception->getMessage()) ? $this->exception->getMessage() : self::DEFAULT_405_MESSAGE,
            500 => strlen($this->exception->getMessage()) ? $this->exception->getMessage() : self::DEFAULT_500_MESSAGE,
            503 => strlen($this->exception->getMessage()) ? $this->exception->getMessage() : self::DEFAULT_503_MESSAGE,
            default => $this->exception->getMessage(),
        };
    }
}
