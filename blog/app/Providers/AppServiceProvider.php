<?php

namespace App\Providers;

use ApiInterface;
use App\Enums\API\VersionEnum;
use App\Services\API\V1\ApiV1Service;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $version = Route::getCurrentRoute()?->getPrefix() ?: env('API_LSV', VersionEnum::V1);

        // Bind the appropriate implementation based on the version
        if ($version === VersionEnum::V1) {
            app()->bind(ApiInterface::class, ApiV1Service::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
