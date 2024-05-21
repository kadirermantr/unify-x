<?php

namespace App\Domain\Services;

use App\Domain\Contracts\AuthRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct(
        protected AuthRepositoryInterface $repository
    ) {
    }

    public function authenticate($username, $password): bool
    {
        $credentials = [
            'email' => $username,
            'password' => $password,
        ];

        return Auth::attempt($credentials);
    }

    public function checkAuthentication($request): true|JsonResponse
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username && $password) {
            if (! $this->authenticate($username, $password)) {
                return response()->json([
                    'error' => 'Email or password is wrong',
                ], 401);
            }
        }

        return true;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
