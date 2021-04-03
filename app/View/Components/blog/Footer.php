<?php

namespace App\View\Components\blog;

use App\Models\SiteConfig;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * @var array|Collection
     */
    public $categories;

    /**
     * @var SiteConfig
     */
    public $configs;

    /**
     * Create a new component instance.
     *
     * @param array|Collection $categories
     * @param SiteConfig $configs
     */
    public function __construct($categories, SiteConfig $configs)
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
        return view('components.blog.footer');
    }
}
