<?php namespace Twitnic\FileAuth;

use App\User;
use Twitnic\FileAuth;
use Illuminate\Support\ServiceProvider;

class FileAuthProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->extend('File',function()
        {
            return new FileUserProvider(new User);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
