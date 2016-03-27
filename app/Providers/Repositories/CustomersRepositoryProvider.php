<?php

namespace App\Providers\Repositories;

use App\Repositories\Repositories\Sql\CustomersRepository;
use Illuminate\Support\ServiceProvider;

class CustomersRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('App\Repositories\Interfaces\Repositories\CustomersRepoInterface', function ($app) {
            return new CustomersRepository();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
