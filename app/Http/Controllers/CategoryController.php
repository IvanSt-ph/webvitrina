<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
public function show(string $slug)
{
    $category = Category::with('children')->where('slug', $slug)->firstOrFail();

    $categoryIds = $category->allChildrenIds();

    $query = Product::whereIn('category_id', $categoryIds)
        ->with(['city.country'])
        ->latest();

    // 🔹 Фильтр по стране
    if (request()->filled('country_id')) {
        $countryId = (int) request('country_id');
        $query->whereHas('city', function ($q) use ($countryId) {
            $q->where('country_id', $countryId);
        });

        // 🔹 Фильтр по городу (только если страна выбрана)
        if (request()->filled('city_id')) {
            $query->where('city_id', (int) request('city_id'));
        }
    }

    // 🔹 Поиск
    if (request()->filled('q')) {
        $query->where('title', 'like', '%' . request('q') . '%');
    }

    // 🔹 Сортировка
    if (request()->filled('sort')) {
        switch (request('sort')) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
                break;
            case 'new':
                $query->latest();
                break;
            case 'benefit':
                $query->orderByRaw('(stock / price) desc');
                break;
            default:
                $query->latest();
        }
    }

    $products = $query->paginate(20)->withQueryString();

    return view('products.index', [
        'category' => $category,
        'products' => $products,
        'activeCategoryId' => $category->id,
    ]);
}

}
