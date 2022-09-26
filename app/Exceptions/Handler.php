<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (Exception $exception, Request $request) {
            if ($request->wantsJson()) {
                return $this->handleApiException($exception);
            }

            return $this->renderExceptionResponse($request, $exception);
        });
    }

    private function handleApiException(Exception $exception): JsonResponse
    {
        $exception = $this->prepareException($exception);

        if ($exception instanceof AuthenticationException) {
            return ApiExceptionHandler::unauthenticated();
        }

        if ($exception instanceof ValidationException) {
            return ApiExceptionHandler::validationException($exception);
        }

        return (new ApiExceptionHandler($exception))->create()->response();
    }
}
