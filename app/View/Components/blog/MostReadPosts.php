<?php

namespace App\View\Components\blog;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Illuminate\Pagination\LengthAwarePaginator;

class MostReadPosts extends Component
{

    /**
     * Collection of most read posts (Blog Model)
     *
     * @var Collection|LengthAwarePaginator
     */
    public $blogs;

    /**
     * Title of the most read post
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @param $blogs
     * @param string $title
     */
    public function __construct($blogs, $title="Most Read")
    {
        $this->blogs = $blogs;
        $this->title = $title;
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
