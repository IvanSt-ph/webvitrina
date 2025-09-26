<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->latest();

        // Фильтр по стране
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Поиск (по названию)
        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->q . '%');
        }

        $products = $query->paginate(12);

        // возвращаем в shop.index (а не products.index, чтобы было единообразие)
        return view('shop.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('reviews.user');
        return view('shop.product-show', compact('product'));
    }
}
