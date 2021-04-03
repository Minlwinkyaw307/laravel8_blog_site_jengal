<?php

namespace App\View\Components\blog;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Navbar extends Component
{

    /**
     * All The Categories available.
     *
     * @var Collection
     */
    public $categories;

    /**
     * @var SiteConfig
     */
    public $configs;

    /**
     * Create a new component instance.
     *
     * @param Collection $categories
     * @param SiteConfig $configs
     */
    public function __construct(Collection $categories, $configs)
    {
        $this->categories = $categories;

        $this->configs = $configs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|\Closure|string
     */
    public function render()
    {
        return view('components.blog.navbar');
    }
}
