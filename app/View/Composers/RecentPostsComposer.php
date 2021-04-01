<?php


namespace App\View\Composers;


use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class RecentPostsComposer
{


    /**
     * Limit of recent posts
     *
     * @var int
     */
    private $limit = 6;


    /**
     * @var Blog[]|Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|Collection
     */
    private $recent_posts;

    /**
     * Create a new recent posts composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->recent_posts = Blog::where([
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
        $view->with('recent_posts', $this->recent_posts);
    }
}
