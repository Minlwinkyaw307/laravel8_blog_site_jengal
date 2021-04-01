<?php

namespace App\Providers;

use App\View\Composers\FeaturedPostsComposer;
use App\View\Composers\RecentPostsComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('blog.*', FeaturedPostsComposer::class);
        View::composer('blog.*', RecentPostsComposer::class);
    }
}
