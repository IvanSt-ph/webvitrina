<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Category;
use App\Models\Review;
use App\Observers\ReviewObserver;

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
        // 📌 Форсируем HTTPS в production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // 📌 Автоматическая загрузка категорий в меню
        View::composer('profile.partials.category-menu', function ($view) {
            $categories = Category::whereNull('parent_id')
                ->with('children.children')
                ->get();

            $view->with('categories', $categories);
        });

        // 📌 Подключаем Observer для отзывов
        Review::observe(ReviewObserver::class);
    }
}
