<?php

namespace App\Domain\Services;

use App\Domain\Contracts\AuthRepositoryInterface;
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

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
