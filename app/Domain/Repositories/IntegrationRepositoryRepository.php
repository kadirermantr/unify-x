<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\IntegrationRepositoryInterface;
use App\Models\Integration;

class IntegrationRepositoryRepository implements IntegrationRepositoryInterface
{
    public function create(array $data)
    {
        return Integration::create($data);
    }

    public function update(Integration $integration, array $data): bool
    {
        return $integration->update($data);
    }

    public function delete(Integration $integration): ?bool
    {
        return $integration->delete();
    }
}
