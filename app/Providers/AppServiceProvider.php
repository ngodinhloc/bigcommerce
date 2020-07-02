<?php

namespace App\Providers;

use App\ORM\Cache\Engines\FileCache;
use Bigcommerce\Api\Client;
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
        if (env('API_STORE_URL')) {
            Client::configure([
                                  'store_url' => env('API_STORE_URL'),
                                  'username'  => env('API_USERNAME'),
                                  'api_key'   => env('API_KEY'),
                              ]);
            Client::verifyPeer(false);
        }
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Configure to use FileCache as the default ORM cache engine
         */
        $this->app->bind('App\ORM\Cache\CacheEngineInterface', function ($app)
        {
            return new FileCache(storage_path('cache') . DIRECTORY_SEPARATOR, 3600);
        });
    }
}
