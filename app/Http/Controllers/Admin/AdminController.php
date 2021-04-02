<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogView;
use App\Models\Category;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $total_blogs = Blog::count();
        $total_categories = Category::count();
        $total_comments =  BlogComment::count();
        $total_views = BlogView::count();

        $popular_blogs = Blog::where([
            ['blog_status_id', '=', 3],
            ['published_at', '<=', Carbon::now()],
        ])
            ->with('category')
            ->withCount('blog_views')
            ->orderBy('blog_views_count', 'desc')
            ->limit(3)
            ->get();


        $recent_comments = BlogComment::orderBy('created_at', 'desc')
            ->with(['blog:id,title,category_id', 'blog.category:id,name,color,slug'])
            ->limit(5)
            ->get();

        return view('admin.index', [
            'total_blogs'           => $total_blogs,
            'total_categories'      => $total_categories,
            'total_comments'        => $total_comments,
            'total_views'           => $total_views,
            'popular_blogs'         => $popular_blogs,
            'recent_comments'       => $recent_comments,
        ]);
    }
}
