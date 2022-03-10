<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Resources\UserLoginResource;
use Domain\Shared\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function authenticate(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        $remember = $request->validated()['remember'] ?? false;
        unset($request->validated()['remember']);

        if (! Auth::attempt($request->validated(), $remember)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'token' => $user->createToken('main')->plainTextToken
            ]
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'data' => [
                'message' => 'Logout successfully'
            ]
        ]);
    }
}
