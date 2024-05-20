<?php

namespace App\Domain\Contracts;

interface AuthRepositoryInterface
{
    public function create(array $data);
}
