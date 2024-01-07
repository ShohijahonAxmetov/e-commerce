<?php

namespace App\Http\Controllers\Panel;

use App\Traits\CategoryTrait;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    use CategoryTrait;

    public string $title = 'Категории';
    public string $route = 'categories';
    public string $routeItem = 'category';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ${$this->route} = Category::orderBy('name->ru')
            ->paginate(20);

        return view('panel.'.$this->route.'.index', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Список',

            $this->route => ${$this->route}
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        ${$this->route} = Category::orderBy('name->ru')
            ->get();

        return view('panel.'.$this->route.'.create', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Добавление',

            $this->route => ${$this->route}
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'nullable',
            'parent_id' => ['nullable', 'integer', 'exists:categories,id']
        ]);

        Category::create($request->all());

        return redirect()->route($this->route.'.index')->withInput()->with(['message' => 'Successfully saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::orderBy('name->ru')
            ->get();

        return view('panel.'.$this->route.'.edit', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Редактирование',

            $this->route => ${$this->route},
            $this->routeItem => ${$this->routeItem}
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'nullable',
            'parent_id' => ['nullable', 'integer', 'exists:categories,id']
        ]);

        ${$this->route}->update($request->all());

        return redirect()->route($this->route.'.index')->withInput()->with(['message' => 'Successfully saved']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();
        try {
            $this->recursiveDelete($category);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['message' => $e->getMessage()])->with(['message' => 'Successfully deleted']);
        }

        return back()->with(['message' => 'Successfully deleted']);
    }
}
