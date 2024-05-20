<?php

namespace App\Http\Controllers\Api;

use App\Domain\Services\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Resources\AuthResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(protected AuthService $service)
    {
    }

    public function register(AuthRegisterRequest $request): JsonResponse
    {
        $data = array_merge($request->validated(), [
            'password' => bcrypt($request->get('password')),
        ]);

        $this->service->create($data);

        return response()->json([
            'message' => 'User created',
        ], 201);
    }

    public function login(AuthLoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'error' => 'Email or password is wrong',
            ], 401);
        }

        return response()->json(
            AuthResource::make(Auth::user())
        );
    }
}
