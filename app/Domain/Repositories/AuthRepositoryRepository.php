<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\AuthRepositoryInterface;
use App\Models\User;

class AuthRepositoryRepository implements AuthRepositoryInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }
}
