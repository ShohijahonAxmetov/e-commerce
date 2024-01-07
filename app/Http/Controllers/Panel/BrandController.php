<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public string $title = 'Бренды';
    public string $route = 'brands';
    public string $routeItem = 'brand';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ${$this->route} = Brand::orderBy('name->ru')
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
        return view('panel.'.$this->route.'.create', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Добавление',
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
        $data = $request->all();
        $data['logo'] = $request->session()->has(auth('admin')->id()) ? $request->session()->get(auth('admin')->id())[count($request->session()->get(auth('admin')->id()))-1] : null;
        $request->session()->forget(auth('admin')->id());

        Brand::create($data);

        return redirect()->route($this->route.'.index')->withInput()->with(['message' => 'Successfully saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    public function edit(Brand $brand)
    {
        return view('panel.'.$this->route.'.edit', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Редактирование',

            $this->routeItem => ${$this->routeItem}
        ]);
    }

    public function update(Request $request, Brand $brand)
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
    public function destroy(Brand $brand)
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
