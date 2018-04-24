<?php

namespace App\Providers;

use App\Repositories\UsersRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserProfileRepository;
use App\Repositories\Contracts\UserProfileRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UsersRepository::class);
        $this->app->bind(UserProfileRepositoryInterface::class, UserProfileRepository::class);
    }
}
