<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStatusCreateRequest;
use App\Http\Requests\BlogStatusDestroyRequest;
use App\Http\Requests\BlogStatusEditRequest;
use App\Http\Requests\BlogStatusIndexRequest;
use App\Http\Requests\BlogStatusStoreRequest;
use App\Http\Requests\BlogStatusUpdateRequest;
use App\Models\BlogStatus;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BlogStatusController extends Controller
{
    /**
     * List all the available blog statuses
     *
     * @param BlogStatusIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(BlogStatusIndexRequest $request)
    {
        $blog_statuses = BlogStatus::select(['id', 'name', 'created_at', 'color'])->withCount(['blogs']);

        if($request->has('search'))
        {
            $search = $request->get('search');
            $blog_statuses->where("name", "like", "%$search%");
        }

        $blog_statuses = $blog_statuses->orderBy('created_at', 'desc')->paginate($request->get('per_page') ?? 10);

        return view('admin.blog-status.index', [
            'blog_statuses'     => $blog_statuses,
        ]);
    }

    /**
     * Show form to create new blog status
     *
     * @param BlogStatusCreateRequest $request
     * @return Application|Factory|View
     */
    public function create(BlogStatusCreateRequest $request)
    {
        return view('admin.blog-status.create-or-edit', [
            'id'        => null,
            'title'     => "Create New Blog Status",
            'item'      => new BlogStatus(),
        ]);
    }

    /**
     * Store new blog status
     *
     * @param BlogStatusStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BlogStatusStoreRequest $request): RedirectResponse
    {
        $params = $request->only([
            'name',
            'color'
        ]);

        $params['color'] = substr($params['color'], 1);

        BlogStatus::create($params);

        return redirect()->route('admin.blog-status.index')->with('success', 'Successfully Created');
    }

    /**
     * Show form to edit current blog status
     *
     * @param BlogStatusEditRequest $request
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(BlogStatusEditRequest $request, $id)
    {
        $item = BlogStatus::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        return view('admin.blog-status.create-or-edit', [
            'id'                => $id,
            'title'             => 'Edit Blog Status',
            'item'              => $item,
        ]);
    }

    /**
     * Update given blog status
     *
     * @param BlogStatusUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(BlogStatusUpdateRequest $request, $id): RedirectResponse
    {
        $item = BlogStatus::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        $params = $request->only([
            'name',
            'color'
        ]);

        $params['color'] = substr($params['color'], 1);

        $item->fill($params)->save();

        return redirect()->route('admin.blog-status.index')->with('success', 'Successfully Created');
    }

    /**
     * Destroy current blog status
     *
     * @param BlogStatusDestroyRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(BlogStatusDestroyRequest $request, $id): RedirectResponse
    {
        $item = BlogStatus::find($id);
        try {
            if ($item) {
                $item->delete();
                return redirect()->route('admin.blog-status.index')->with('success', 'Successfully Deleted');
            }else{
                throw new \Exception("No Blog Status");
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.blog-status.index')->withErrors("Couldn't Delete Status! Please Try Again");
        }
    }
}
