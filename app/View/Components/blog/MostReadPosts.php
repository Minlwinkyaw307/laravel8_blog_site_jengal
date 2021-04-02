<?php

namespace App\View\Components\blog;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class MostReadPosts extends Component
{

    /**
     * Collection of most read posts (Blog Model)
     *
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
        return view('components.blog.most-read-posts');
    }
}
