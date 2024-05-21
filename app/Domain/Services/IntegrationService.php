<?php

namespace App\Domain\Services;

use App\Domain\Contracts\IntegrationRepositoryInterface;
use App\Models\Integration;

class IntegrationService
{
    public function __construct(
        protected IntegrationRepositoryInterface $repository
    ) {
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function update(Integration $integration, array $data)
    {
        return $this->repository->update($integration, $data);
    }

    public function delete(Integration $integration)
    {
        return $this->repository->delete($integration);
    }
}
