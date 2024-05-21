<?php

namespace App\Console\Commands;

use App\Domain\Services\AuthService;
use App\Domain\Services\IntegrationService;
use Illuminate\Console\Command;

class ManageIntegration extends Command
{
    protected $signature = 'integration:manage {action} {id?} {--marketplace=} {--username=} {--password=}';

    protected $description = 'Manage integrations: create, update, delete';

    public function __construct(
        protected AuthService $authService,
        protected IntegrationService $integrationService,
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        $id = $this->argument('id');

        $data = [
            'marketplace' => $this->option('marketplace'),
            'username' => $this->option('username'),
            'password' => $this->option('password'),
        ];

        match ($this->argument('action')) {
            'create' => $this->create($data),
            'update' => $this->update($id, $data),
            'delete' => $this->delete($id),
            default => $this->error('Invalid action'),
        };
    }

    protected function create($data): void
    {
        if (! $this->authService->checkAuthentication($data)) {
            $this->error('Email or password is wrong');
            return;
        }

        $integration = $this->integrationService->create($data);

        $this->info('Integration created. integration id: '.$integration->id);
    }

    protected function update($id, $data): void
    {
        $integration = $this->integrationService->find($id);

        if (! $integration) {
            $this->error('Integration not found');

            return;
        }

        if (! $this->authService->checkAuthentication($data)) {
            $this->error('Email or password is wrong');
            return;
        }

        $this->integrationService->update($integration, $data);

        $this->info('Integration updated');
    }

    protected function delete($id): void
    {
        $integration = $this->integrationService->find($id);

        if (! $integration) {
            $this->error('Integration not found');

            return;
        }

        $this->integrationService->delete($integration);

        $this->info('Integration deleted');
    }
}
