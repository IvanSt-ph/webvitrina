<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Делаем так, чтобы во всех видах, где есть category-menu,
        // всегда были категории
        View::composer('profile.partials.category-menu', function ($view) {
            $categories = Category::whereNull('parent_id')
                ->with('children.children')
                ->get();

            $view->with('categories', $categories);
        });
    }
}
