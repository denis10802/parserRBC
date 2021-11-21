<?php

namespace App\Providers;

use App\Components\Services\FeedReadRBC;
use App\Contracts\FeedReadInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FeedReadInterface::class,  FeedReadRBC::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
