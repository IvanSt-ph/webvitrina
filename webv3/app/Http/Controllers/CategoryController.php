<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function menu()
    {
        // грузим все категории вместе с подкатегориями
$categories = Category::with('children')->whereNull('parent_id')->get();
return view('твоя_страница', compact('categories'));

    }

    
}

