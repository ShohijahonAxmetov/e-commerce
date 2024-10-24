<?php

namespace App\Http\Controllers\Panel\Attribute;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\StoreRequest;
use App\Http\Requests\Attribute\UpdateRequest;
use App\Models\Attribute\Attribute;
use App\Models\Attribute\AttributeGroup;
use App\Models\Category;
use App\Models\Product\Product;
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
        ${$this->route} = Attribute::query()
            ->orderBy('name->ru')
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
        $categories = Category::query()
            ->orderBy('name->ru')
            ->get();
        $groups = AttributeGroup::query()
            ->orderBy('name->ru')
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
    public function store(StoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $attribute = Attribute::query()->create($request->validated());
            $attribute->categories()->sync($request->input('categories'));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->withErrors(['message' => $e->getMessage()]);
        }

        return redirect()
            ->route($this->route.'.index')
            ->withInput()
            ->with(['message' => 'Successfully saved']);
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
        $categories = Category::query()
            ->orderBy('name->ru')
            ->get();
        $groups = AttributeGroup::query()
            ->orderBy('name->ru')
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
    public function update(UpdateRequest $request, Attribute $attribute): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            ${$this->routeItem}->update($request->validated());
            ${$this->routeItem}->categories()->sync($request->input('categories'));

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withInput()->withErrors(['message' => $e->getMessage()]);
        }

        return redirect()
            ->route($this->route.'.index')
            ->withInput()
            ->with(['message' => 'Successfully saved']);
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
