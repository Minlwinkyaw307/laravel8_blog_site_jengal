<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexBlogsRequest;
use App\Http\Requests\StoreBlogCommentRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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
        return view('blog.index');
    }

    /**
     * Show detail of the blog which slug was passed on route
     *
     * @param Request $request
     * @param string $slug
     * @return Application|Factory|View
     */
    public function blog_view(Request $request, string $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->with('category', 'user')
            ->withCount(['blog_views', 'blog_comments'])
            ->firstOrFail();
        return view('blog.blog-detail', [
            'blog' => $blog
        ]);
    }

    public function blogs(IndexBlogsRequest $request)
    {
        $blogs = Blog::query();

        if($request->has('category'))
        {
            $category_slug = $request->get('category');

            $blogs->whereHas('category', function($query) use ($category_slug) {
                $query->where('slug', $category_slug);
            });
        }else {
            $blogs = $blogs->with('category');
        }

        if($request->has('search'))
        {
            $search = $request->get('search');
            $blogs = $blogs->where(function($query) use ($search) {
                $query->where("title", "like", "%$search%")
                    ->orWhere("content", "like", "%$search%");
            });
        }

        $blogs = $blogs->paginate($request->get('per_page') ?? 5);
        return view('blog.blogs', [
            'blogs' => $blogs,
        ]);
    }


    /**
     * @param StoreBlogCommentRequest $request
     * @param string $slug
     * @return RedirectResponse
     */
    public function store_comment(StoreBlogCommentRequest $request, string $slug): RedirectResponse
    {
        $blog = Blog::where('slug', $slug)->select('id')->firstOrFail();
        $params = $request->only([
            'name',
            'email',
            'website',
            'comment'
        ]);

        $params['blog_id'] = $blog->id;
        try {
            BlogComment::create($params);
            return redirect()->back()->with(['success' => 'Successfully Submitted Your Comment']);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors('Getting error while creating. Please try again!');
        }
    }
}
