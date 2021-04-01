<?php


namespace App\View\Composers;


use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class FeaturedPostsComposer
{

    /**
     * Limit of featured posts
     *
     * @var int
     */
    private $limit = 3;

    /**
     * @var Blog[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    private $featured_posts;

    /**
     * Create a new recent posts composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->featured_posts = Blog::where([
            ['is_featured', '=', true],
            ['published_at', '!=', null],
            ['blog_status_id', '=', '3']
        ])->orderBy('published_at')
            ->with('category')
            ->limit($this->limit)->get();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('featured_posts', $this->featured_posts);
    }
}
