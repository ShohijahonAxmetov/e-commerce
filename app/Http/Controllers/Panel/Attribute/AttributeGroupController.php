<?php

namespace App\Http\Controllers\Panel\Attribute;

use App\Http\Controllers\Controller;
use App\Models\Attribute\AttributeGroup;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeGroupController extends Controller
{
    public string $title = 'Группа атрибутов';
    public string $route = 'attribute_groups';
    public string $routeItem = 'attribute_group';
    public string $varName = 'attributeGroup';
    public string $folder = 'attributes.groups';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ${$this->route} = AttributeGroup::orderBy('name->ru')
            ->paginate(20);

        return view('panel.'.$this->folder.'.index', [
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

        return view('panel.'.$this->folder.'.create', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Добавление',

            'categories' => $categories,
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
            'categories.*' => 'integer'
        ]);
        $data = $request->all();

        DB::beginTransaction();
        try {
            $group = AttributeGroup::create($data);
            $group->categories()->sync($request->input('categories'));

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
    public function show(AttributeGroup $attributeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttributeGroup $attributeGroup)
    {
        $categories = Category::orderBy('name->ru')
            ->get();

        return view('panel.'.$this->folder.'.edit', [
            'title' => $this->title,
            'route' => $this->route,
            'routeItem' => $this->routeItem,
            'action' => 'Редактирование',

            $this->routeItem => ${$this->varName},

            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttributeGroup $attributeGroup)
    {
        $request->validate([
            'name' => 'required',
            'desc' => 'nullable',
            'categories' => 'array',
            'categories.*' => 'integer',
        ]);

        DB::beginTransaction();
        try {
            ${$this->varName}->update($request->all());
            ${$this->varName}->categories()->sync($request->input('categories'));

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
    public function destroy(AttributeGroup $attributeGroup)
    {
        DB::beginTransaction();
        try {
            ${$this->varName}->attributes()->delete();
            // ${$this->varName}->categories()->detach();
            ${$this->varName}->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors(['message' => $e->getMessage()]);
        }

        return back()->with(['message' => 'Successfully deleted']);
    }
}
