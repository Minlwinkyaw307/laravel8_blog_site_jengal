<?php


namespace App\View\Composers;


use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;

class MostReadPostsComposer
{
    /**
     * Limit of featured posts
     *
     * @var int
     */
    private $limit = 5;

    /**
     * @var Blog[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    private $most_read_posts;

    /**
     * Create a new recent posts composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->most_read_posts = Blog::where([
            ['blog_status_id', '=', 3],
            ['published_at', '<=', Carbon::now()]
        ])
            ->with('category')
            ->withCount('blog_views')
            ->orderBy('blog_views_count', 'desc')
            ->limit($this->limit)
            ->get();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('most_read_posts', $this->most_read_posts);
    }
}
