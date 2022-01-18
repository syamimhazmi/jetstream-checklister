<?php
namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        $this->registerContracts();
    }

    /**
     * Register application contracts.
     */
    protected function registerContracts(): void
    {
        $this->app->bind('App\Contracts\Repositories\ChecklistGroup', 'App\Repositories\ChecklistGroup');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(125);
    }
}
