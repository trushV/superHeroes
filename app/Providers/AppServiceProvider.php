<?php

namespace App\Providers;

use App\Repositories\ImagesRepository\Contracts\ImageRepositoryInterface;
use App\Repositories\ImagesRepository\ImageRepository;
use App\Repositories\SuperheroRepository\Contracts\SuperheroRepositoryInterface;
use App\Repositories\SuperheroRepository\SuperheroRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->bind(SuperheroRepositoryInterface::class, SuperheroRepository::class);
    }
}
