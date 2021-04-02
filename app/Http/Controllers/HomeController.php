<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Serve index page of site
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $most_read_posts = Blog::where([
            ['blog_status_id', '=', 3],
            ['published_at', '<=', Carbon::now()]
        ])
            ->with('category')
            ->withCount('blog_views')
            ->orderBy('blog_views_count', 'desc')
            ->limit(5)
            ->get();
        return view('blog.index', [
            'most_read_posts' => $most_read_posts
        ]);
    }

    /**
     * Show detail of the blog which slug was passed on route
     *
     * @param Request $request
     * @param $slug
     * @return Blog
     */
    public function blog_view(Request $request, $slug): Blog
    {
        $blog = Blog::where('slug', $slug)->with('category')->withCount('blog_views')->firstOrFail();
        return $blog;
    }
}
