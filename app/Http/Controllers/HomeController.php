<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexBlogsRequest;
use App\Http\Requests\StoreBlogCommentRequest;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogView;
use App\Models\ContactMessage;
use App\Models\SiteConfig;
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

        $view = BlogView::where([
            ['ip', $request->ip()],
            ['blog_id', $blog->id]
        ])->first();

        if(!$view)
        {
            BlogView::create([
                'ip' => $request->ip(),
                'blog_id' => $blog->id,
            ]);
        }

        return view('blog.blog-detail', [
            'blog'      => $blog,
            'title'     => $blog->title,
            'description'   => strip_tags($blog->content),
            'meta_image'    => $blog->thumbnail_url,
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
            'title'     => 'WEBIMG | Blogs',
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

    /**
     * Render Contact Page View
     *
     * @return Application|Factory|View
     */
    public function contact()
    {
        $contact_message = SiteConfig::select(['contact_message'])->first();

        return view('blog.contact', [
            'contact_message' => $contact_message->contact_message,
            'title'     => 'WEBIMG | Contact Us',
        ]);
    }

    public function store_contact_message(StoreContactMessageRequest $request): RedirectResponse
    {
        $params = $request->only([
            'email',
            'subject',
            'message'
        ]);

        ContactMessage::create($params);

        return redirect()->route('blog.contact')->with('success', 'Successfully Received Your Message. We Will Contact You Soon.');
    }

    public function about()
    {
        $about = SiteConfig::select(['about'])->first();

        if(!$about)
        {
            return redirect()->back()->withErrors('Invalid request');
        }

        return view('blog.about-policy', [
            'content'   => $about->about,
            'title'     => 'WEBIMG | About Us',
        ]);
    }

    public function policy()
    {
        $policy = SiteConfig::select('policy')->first();

        if(!$policy)
        {
            return redirect()->back()->withErrors('Invalid request');
        }

        return view('blog.about-policy', [
            'content'       => $policy->policy,
            'title'         => "WEBIMG | Policy"
        ]);
    }
}
