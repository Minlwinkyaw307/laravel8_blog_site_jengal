<?php

namespace App\Providers;

use App\View\Composers\CategoryComposer;
use App\View\Composers\ConfigComposer;
use App\View\Composers\FeaturedPostsComposer;
use App\View\Composers\MostReadPostsComposer;
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
        View::composer('blog.*', CategoryComposer::class);
        View::composer('blog.*', MostReadPostsComposer::class);
        View::composer('blog.*', ConfigComposer::class);
    }
}
