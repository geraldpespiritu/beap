<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
/*use Illuminate\Support\ServiceProvider;*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Resources\Json\Resource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
     \URL::forceRootUrl(\Config::get('app.url'));

    if(str_contains(\Config::get('app.url'), 'https://'))
    {
        \URL::forceScheme('https');
    }

        Schema::defaultStringLength(191);
       // Resource::withoutWrapping();

        $this->RegisterPolicies();
        Passport::routes();
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
