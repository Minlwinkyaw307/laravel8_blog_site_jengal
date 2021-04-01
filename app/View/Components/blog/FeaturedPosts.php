<?php

namespace App\View\Components\blog;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class FeaturedPosts extends Component
{

    /**
     * @var Collection
     */
    public $blogs;


    /**
     * Create a new component instance.
     *
     * @param Collection $blogs
     */
    public function __construct(Collection $blogs)
    {
        $this->blogs = $blogs;
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
