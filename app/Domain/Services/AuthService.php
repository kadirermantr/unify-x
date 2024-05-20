<?php

namespace App\Domain\Services;

use App\Domain\Contracts\AuthRepositoryInterface;

class AuthService
{
    public function __construct(
        protected AuthRepositoryInterface $repository
    ) {
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}
