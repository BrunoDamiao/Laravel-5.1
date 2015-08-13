<?php

namespace CodeProject\Providers;

use Illuminate\Support\ServiceProvider;

class CodeProjectRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Chamando o ClientRepositoryEloquent
        $this->app->bind(
            \CodeProject\Repositories\ClientRepository::class,
            \CodeProject\Repositories\ClientRepositoryEloquent::class
        );

        // Chamando o ProjectRepositoryEloquent
        $this->app->bind(
            \CodeProject\Repositories\ProjectRepository::class,
            \CodeProject\Repositories\ProjectRepositoryEloquent::class
        );
    }
}
