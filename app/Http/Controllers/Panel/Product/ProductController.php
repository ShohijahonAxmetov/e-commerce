<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product\Product;
use App\Models\Product\ProductVariation;
use App\Models\Product\ProductVariationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            ->with('variations.images')
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
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'name.'.$this->getMainLang() => 'required',
            'desc' => 'nullable',
            'category_id' => 'nullable|integer|exists:categories,id',
            'brand_id' => 'nullable|integer|exists:brands,id',
            'variations' => 'array',
            'variations.*.name.'.$this->getMainLang() => 'required',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::create($request->all());

            foreach ($request->input('variations') as $variation) {
                $variationData = $variation;
                $variationData['product_id'] = $product->id;

                $variationModel = ProductVariation::create($variationData);

                if (isset($variation['files'][0])) {
                    foreach ($variation['files'] as $file) {
                        Storage::move($file, 'products/'.$this->tmpToPath($file));

                        $productVariationImage = ProductVariationImage::create([
                            'path' => 'products/'.$this->tmpToPath($file)
                        ]);

                        $variationModel->images()->attach($productVariationImage->id);
                    }
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->withErrors();
        }

        /*
         * delete variations data form session
         */
        $sessionData = session('files');
        unset($sessionData['variations']);
        session(['files' => $sessionData]);

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
            foreach (${$this->routeItem}->variations as $variation) {
                $variation->images()->delete();
                $variation->delete();
            }
            ${$this->routeItem}->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['message' => $e->getMessage()])->with(['message' => 'Successfully deleted']);
        }

        return back()->with(['message' => 'Successfully deleted']);
    }
}
