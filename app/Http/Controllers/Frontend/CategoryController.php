<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Review;
use App\Models\Song;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('id', '!=', 1)->get();
        $reviews = Review::all();
        return view('categories.index', compact('categories', 'reviews'));
    }

    public function show(Category $category)
    {
        $tables = Table::where('category_id', 'like', $category->id)->get();
        $reviews = Review::where('category_id', 'like', $category->id)->orderBy('created_at', 'desc')->paginate(3);

        $degrees = [
            'Отрицательный',
            'Нейтральный',
            'Положительный',
        ];
        return view('categories.show', compact('category', 'tables', 'reviews', 'degrees'));
    }

    public function storeReview(Request $request)
    {
        Review::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'review_text' => $request->review_text,
            'review_degree' => $request->review_degree,
            'category_id' => $request->category_id
        ]);
        $category = Category::where('id', $request->category_id)->first();
        return to_route('categories.show', compact('category'))->with('success', 'Отзыв отправлен успешно!');
    }
}
