<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\BlogDestroyRequest;
use App\Http\Requests\BlogEditRequest;
use App\Http\Requests\BlogIndexRequest;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\BlogStatus;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::with(['category:id,name', 'blog_status:id,name,color', 'user:id,name'])
            ->select(['id', 'title', 'category_id', 'blog_status_id', 'user_id']);

        if ($request->has('search') && !is_null($request->get('search'))) {
            $search = $request->get('search');

            $blogs = $blogs->where("title", "like", "%$search%");
        }

        if ($request->has('blog_status_id') && !empty($request->get('blog_status_id'))) {
            $blogs = $blogs->where('blog_status_id', $request->get('blog_status_id'));
        }

        if ($request->has('category_id') && !empty($request->get('category_id'))) {
            $blogs = $blogs->where('category_id', $request->get('category_id'));
        }

        $blogs = $blogs->orderBy('created_at', 'desc')
            ->paginate($request->get('per_page') ?? 10);

        $options = $this->get_required_options();

        return view('admin.blog.index', [
            'blogs' => $blogs,
            'blog_statuses' => $options['blog_statuses'],
            'categories' => $options['categories'],
        ]);
    }

    public function create(BlogCreateRequest $request)
    {
        $options = $this->get_required_options();

        return view('admin.blog.create-or-edit', [
            'title'             => 'Create New Blog',
            'item'              => new Blog(),
            'blog_statuses'     => $options['blog_statuses'],
            'categories'        => $options['categories'],
            'id'                => null,
        ]);
    }

    /**
     * Store new blog.
     *
     * @param BlogStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BlogStoreRequest $request): RedirectResponse
    {
        $params = $request->only([
            'title',
            'content',
            'category_id',
            'blog_status_id',
            'is_featured',
            'published_at',
        ]);

        $params['user_id'] = 1;
        $params['slug'] = Str::slug($request->get('title'));

        if ($request->hasFile('thumbnail') && $request->hasFile('image')) {
            $params['thumbnail'] = Storage::putFile('blogs', $request->file('thumbnail'));
            $params['image'] = Storage::putFile('blogs', $request->file('image'));
        }

        Blog::create($params);

        return redirect()->route('admin.blog.index')->with('success', 'Successfully Created');
    }

    /**
     * Show edit page for given blog.
     *
     * @param BlogEditRequest $request
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(BlogEditRequest $request, $id)
    {
        $item = Blog::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        $options = $this->get_required_options();

        return view('admin.blog.create-or-edit', [
            'title'             => 'Edit Blog',
            'item'              => $item,
            'blog_statuses'     => $options['blog_statuses'],
            'categories'        => $options['categories'],
            'id'                => $id
        ]);
    }

    /**
     * Update blog using given blog id.
     *
     * @param BlogUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BlogUpdateRequest $request, $id): RedirectResponse
    {
        $item = Blog::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        $params = $request->only([
            'title',
            'content',
            'category_id',
            'blog_status_id',
            'is_featured',
            'published_at',
        ]);

        $params['user_id'] = 1;
        $params['slug'] = Str::slug($request->get('title'));

        if ($request->hasFile('thumbnail')) {
            if(Storage::exists($item->thumbnail))
            {
                Storage::delete($item->thumbnail);
            }
            $params['thumbnail'] = Storage::putFile('blogs', $request->file('thumbnail'));
        }else {
            $params['thumbnail'] = $item->thumbnail;
        }

        if($request->hasFile('image'))
        {
            if(Storage::exists($item->image))
            {
                Storage::delete($item->image);
            }
            $params['image'] = Storage::putFile('blogs', $request->file('image'));
        }else {
            $params['image'] = $item->image;
        }


        $item->fill($params);

        $item->save();

        return redirect()->route('admin.blog.index')->with('success', 'Successfully Updated');

    }

    /**
     * Destroy Blog by given id
     *
     * @param BlogDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(BlogDestroyRequest $request, $id): RedirectResponse
    {
        $item = Blog::find($id);
        try {
            if ($item) {
                $item->delete();
                return redirect()->route('admin.blog.index')->with('success', 'Successfully Deleted');
            }else{
                throw new \Exception("No Blog");
            }
        } catch (\Exception $e) {

            return redirect()->route('admin.blog.index')->withErrors("Couldn't Delete Blog! Please Try Again");
        }
    }

    /**
     * Return required blog statuses and categories for index, edit and create page.
     *
     * @return array
     */
    private function get_required_options(): array
    {
        $blog_statues = BlogStatus::select(['id', 'name'])->get();
        $blog_statues = $blog_statues->mapWithKeys(function ($status) {
            return [$status->id => $status->name];
        });

        $categories = Category::select(['id', 'name'])->get();
        $categories = $categories->mapWithKeys(function ($category) {
            return [$category->id => $category->name];
        });

        return [
            'blog_statuses' => $blog_statues,
            'categories'    => $categories,
        ];
    }
}
