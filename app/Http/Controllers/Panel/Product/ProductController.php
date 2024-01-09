<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public string $title = 'Продукты';
    public string $route = 'products';
    public string $routeItem = 'product';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ${$this->route} = Product::orderBy('name->ru')
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
        $categories = Category::orderBy('name->ru')
            ->get();
        $brands = Brand::orderBy('name->ru')
            ->get();

        return view('panel.'.$this->route.'.create', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Добавление',

            'categories' => $categories,
            'brands' => $brands,
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
        ]);

        Product::create($request->all());

        return redirect()->route($this->route.'.index')->withInput()->with(['message' => 'Successfully saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('panel.'.$this->route.'.edit', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Редактирование',

            $this->routeItem => ${$this->routeItem}
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'nullable',
        ]);

        ${$this->routeItem}->update($request->all());

        return redirect()->route($this->route.'.index')->withInput()->with(['message' => 'Successfully saved']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try {
            ${$this->routeItem}->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['message' => $e->getMessage()])->with(['message' => 'Successfully deleted']);
        }

        return back()->with(['message' => 'Successfully deleted']);
    }
}
