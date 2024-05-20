<?php

namespace App\Providers;

use App\Domain\Contracts\AuthRepositoryInterface;
use App\Domain\Contracts\IntegrationRepositoryInterface;
use App\Domain\Repositories\AuthRepositoryRepository;
use App\Domain\Repositories\IntegrationRepositoryRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepositoryRepository::class);
        $this->app->bind(IntegrationRepositoryInterface::class, IntegrationRepositoryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
