<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogView;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show login page with form
     *
     * @return Application|Factory|View
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * Attempt To Login Using given Information
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function post_login(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'),], $request->get('remember') ?? false)) {
            $user = User::where('id', Auth::id())->first();

            activity('user')
                ->causedBy($user)
                ->log('login');

            return redirect()->route('admin.index');
        } else {
            $user = User::where('email', request('email'))->first();
            if ($user) {
                activity('user')
                    ->causedBy($user)
                    ->log('failed_login');
            } else {
                activity('user')
                    ->withProperties(['email' => request('email')])
                    ->log('failed_login');
            }
            return redirect()->back()->withErrors('Login Failed! Please Try Again');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
