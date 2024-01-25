<?php

namespace App\Http\Controllers\Panel\Attribute;

use App\Http\Controllers\Controller;
use App\Models\Attribute\Attribute;
use App\Models\Attribute\AttributeGroup;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    public string $title = 'Атрибуты';
    public string $route = 'attributes';
    public string $routeItem = 'attribute';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ${$this->route} = Attribute::orderBy('name->ru')
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
        $groups = AttributeGroup::orderBy('name->ru')
            ->get();

        return view('panel.'.$this->route.'.create', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Добавление',

            'categories' => $categories,
            'groups' => $groups,
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
            'categories' => 'array',
            'categories.*' => 'integer',
            'attribute_group_id' => 'nullable|integer',
        ]);
        $data = $request->all();

        DB::beginTransaction();
        try {
            $attribute = Attribute::create($data);
            $attribute->categories()->sync($request->input('categories'));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->withErrors(['message' => $e->getMessage()]);
        }

        return redirect()->route($this->route.'.index')->withInput()->with(['message' => 'Successfully saved']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attribute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attribute $attribute)
    {
        $categories = Category::orderBy('name->ru')
            ->get();
        $groups = AttributeGroup::orderBy('name->ru')
            ->get();

        return view('panel.'.$this->route.'.edit', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Редактирование',

            $this->routeItem => ${$this->routeItem},

            'categories' => $categories,
            'groups' => $groups,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attribute $attribute)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'nullable',
            'categories' => 'array',
            'categories.*' => 'integer',
            'attribute_group_id' => 'nullable|integer'
        ]);

        DB::beginTransaction();
        try {
            ${$this->routeItem}->update($request->all());
            ${$this->routeItem}->categories()->sync($request->input('categories'));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->withErrors(['message' => $e->getMessage()]);
        }

        return redirect()->route($this->route.'.index')->withInput()->with(['message' => 'Successfully saved']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attribute $attribute)
    {
        DB::beginTransaction();
        try {
            // ${$this->routeItem}->categories()->detach();
            ${$this->routeItem}->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['message' => $e->getMessage()]);
        }

        return back()->with(['message' => 'Successfully deleted']);
    }
}
