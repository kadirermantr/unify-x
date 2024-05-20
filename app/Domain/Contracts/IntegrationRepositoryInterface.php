<?php

namespace App\Domain\Contracts;

use App\Models\Integration;

interface IntegrationRepositoryInterface
{
    public function create(array $data);

    public function update(Integration $integration, array $data);

    public function delete(Integration $integration);
}
