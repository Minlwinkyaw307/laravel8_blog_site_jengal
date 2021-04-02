<?php


namespace App\View\Composers;


use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * Limit of featured posts
     *
     * @var int
     */
    private $limit = 3;

    /**
     * @var Category[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    private $categories;

    /**
     * Create a new recent posts composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Category::withCount('blogs')->orderBy('blogs_count', 'desc')->get();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->categories);
    }
}
