<?php

namespace App\View\Components\blog;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedPosts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.featured-posts');
    }
}
