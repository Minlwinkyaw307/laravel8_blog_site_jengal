<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCreateRequest;
use App\Http\Requests\CategoryDestoryRequest;
use App\Http\Requests\CategoryEditRequest;
use App\Http\Requests\CategoryIndexRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * List all the available categories
     *
     * @param CategoryIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(CategoryIndexRequest $request)
    {
        $categories = Category::select(['id', 'name', 'slug', 'color', 'created_at'])->withCount(['blogs']);

        if($request->has('search'))
        {
            $search = $request->get('search');
            $categories->where("name", "like", "%$search%");
        }

        $categories = $categories->paginate($request->get('per_page') ?? 10);

        return view('admin.category.index', [
            'categories'        => $categories,
        ]);
    }

    public function create(BlogCreateRequest $request)
    {
        return view('admin.category.create-or-edit', [
            'id'        => null,
            'title'     => "Create New Category",
            'item'      => new Category(),
        ]);
    }

    /**
     * Store new category.
     *
     * @param CategoryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $params = $request->only([
            'name',
            'description',
            'color'
        ]);

        $params['slug'] = Str::slug($request->get('name')) . '-' . Str::random(5);
        $params['color'] = substr($params['color'], 1);

        Category::create($params);

        return redirect()->route('admin.category.index')->with('success', 'Successfully Created');
    }

    /**
     * Show edit page for given category.
     *
     * @param CategoryEditRequest $request
     * @param int $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(CategoryEditRequest $request, int $id)
    {
        $item = Category::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        return view('admin.category.create-or-edit', [
            'id'                => $id,
            'title'             => 'Edit Category',
            'item'              => $item,
        ]);
    }

    /**
     * Update the given category
     *
     * @param CategoryUpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, $id): RedirectResponse
    {
        $item = Category::find($id);

        if(!$item)
        {
            return redirect()->back()->withErrors('Invalid Request');
        }

        $params = $request->only([
            'name',
            'description',
            'color'
        ]);

        $params['slug'] = Str::slug($request->get('name')) . '-' . Str::random(5);
        $params['color'] = substr($params['color'], 1);

        $item->fill($params)->save();

        return redirect()->route('admin.category.index')->with('success', 'Successfully Created');
    }

    /**
     * Destroy given category
     *
     * @param CategoryDestoryRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function destroy(CategoryDestoryRequest $request, $id): RedirectResponse
    {
        $item = Category::find($id);
        try {
            if ($item) {
                $item->delete();
                return redirect()->route('admin.category.index')->with('success', 'Successfully Deleted');
            }else{
                throw new \Exception("No Category");
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.category.index')->withErrors("Couldn't Delete Blog! Please Try Again");
        }
    }
}
