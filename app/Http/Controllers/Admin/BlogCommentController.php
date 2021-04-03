<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCommentCreateRequest;
use App\Http\Requests\BlogCommentDestroyRequest;
use App\Http\Requests\BlogCommentEditRequest;
use App\Http\Requests\BlogCommentIndexRequest;
use App\Http\Requests\BlogCommentStoreRequest;
use App\Http\Requests\BlogCommentUpdateRequest;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BlogCommentController extends Controller
{
    /**
     * List all the comments
     *
     * @param BlogCommentIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(BlogCommentIndexRequest $request)
    {
        $blog_comments = BlogComment::with('blog:id,title')
            ->select(['id', 'name', 'email', 'comment', 'blog_id']);

        if($request->has('search'))
        {
            $search = $request->get('search');
            $blog_comments->where(function($query) use ($search) {
                $query->where("name", "like", "%$search%")
                    ->orWhere("comment", "like", "%$search%");
            });
        }

        if($request->has('blog_id') && !empty($request->get('blog_id')))
        {
            $blog_comments->where('blog_id', $request->get('blog_id'));
        }

        $blog_comments = $blog_comments->orderBy('created_at', 'desc')->paginate($request->get('per_page') ?? 10);

        return view('admin.blog-comment.index', [
            'blog_comments' => $blog_comments,
            'blogs'         => $this->get_request_options(),
        ]);
    }

    /**
     * Show form to create new comment
     *
     * @param BlogCommentCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(BlogCommentCreateRequest $request)
    {
        return view('admin.blog-comment.create-or-edit', [
            'id'        => null,
            'title'     => "Create New Comment",
            'blogs'     => $this->get_request_options(),
            'item'          => new BlogComment(),
        ]);
    }

    /**
     * Store new comment
     *
     * @param BlogCommentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BlogCommentStoreRequest $request): RedirectResponse
    {
        $params = $request->only([
            'name',
            'email',
            'website',
            'comment',
            'blog_id'
        ]);

        BlogComment::create($params);

        return redirect()->route('admin.blog-comment.index')->with('success', 'Successfully Created');
    }

    /**
     * Show Update Form For Comment
     *
     * @param BlogCommentEditRequest $request
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(BlogCommentEditRequest $request, $id)
    {
        $item = BlogComment::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        return view('admin.blog-comment.create-or-edit', [
            'id'                => $id,
            'title'             => 'Edit Comment',
            'item'              => $item,
            'blogs'             => $this->get_request_options(),
        ]);
    }

    /**
     * Update given comment
     *
     * @param BlogCommentUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BlogCommentUpdateRequest $request, $id): RedirectResponse
    {
        $item = BlogComment::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        $params = $request->only([
            'name',
            'email',
            'website',
            'comment',
            'blog_id'
        ]);

        $item->fill($params)->save();

        return redirect()->route('admin.blog-comment.index')->with('success', 'Successfully Updated');
    }

    /**
     * Destroy given comment
     *
     * @param BlogCommentDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(BlogCommentDestroyRequest $request, $id): RedirectResponse
    {
        $item = BlogComment::find($id);
        try {
            if ($item) {
                $item->delete();
                return redirect()->route('admin.blog-comment.index')->with('success', 'Successfully Deleted');
            }else{
                throw new \Exception("No Category");
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.blog-comment.index')->withErrors("Couldn't Delete Comment! Please Try Again");
        }
    }

    /**
     * Return List of Blogs which will be shown inside option
     *
     * @return Collection
     */
    private function get_request_options(): Collection
    {
        return  Blog::select(['id', 'title'])->get()->mapWithKeys(function($blog) {
            return [$blog->id => $blog->title];
        });
    }
}
