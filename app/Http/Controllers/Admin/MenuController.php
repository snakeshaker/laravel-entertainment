<?php

namespace App\Http\Controllers\Admin;

use App\Exports\MenusExport;
use App\Exports\ReservationsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\FoodCategory;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $foodCategories = FoodCategory::all();
        return view('admin.menus.create', compact('foodCategories'));
    }

    public function store(MenuStoreRequest $request)
    {
        $image = $request->file('image')->store('menus');

        $menu = Menu::create([
            'name' => $request->name,
            'image' => $image,
            'description' => $request->description,
            'price' => $request->price
        ]);

        if ($request->has('categories')) {
            $menu->food_categories()->attach($request->categories);
        }

        return to_route('admin.menus.index')->with('success', 'Блюдо создано успешно!');
    }

    public function edit(Menu $menu)
    {
        $foodCategories = FoodCategory::all();
        return view('admin.menus.edit', compact('menu', 'foodCategories'));
    }

    public function update(Request $request, Menu $menu)
    {
        $checkbox = isset($request->is_active[0]) ? 1 : 0;
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $image = $menu->image;
        if($request->hasFile('image')){
            Storage::delete($menu->image);
            $image = $request->file('image')->store('menus');
        }

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
            'is_active' => $checkbox
        ]);

        if ($request->has('categories')) {
            $menu->food_categories()->sync($request->categories);
        }
        return to_route('admin.menus.index')->with('success', 'Блюдо обновлено успешно!');
    }

    public function show()
    {
        return Excel::download(new MenusExport, 'Список блюд.xlsx');
    }
}
