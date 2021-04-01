<?php

namespace App\View\Components\blog;

use App\Models\Blog;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostTextOverCard extends Component
{

    /**
     * Blog Model
     *
     * @var Blog
     */
    public $blog;

    /**
     * Create a new component instance.
     *
     * @param Blog $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.post-text-over-card');
    }
}
