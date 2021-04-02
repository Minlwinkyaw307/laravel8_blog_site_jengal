<?php

namespace App\View\Components\blog;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class PostCategories extends Component
{
    /**
     * All the categories of the posts(Blogs)
     *
     * @var Collection
     */
    public $categories;

    /**
     * Create a new component instance.
     *
     * @param Collection $categories
     */
    public function __construct(Collection $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.post-categories');
    }
}
