<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SupportEloquenteORM;
use App\Repositories\SupportRepositoryInterface;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SupportRepositoryInterface::class,
            SupportEloquenteORM::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
