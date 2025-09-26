<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProductController,
    FavoriteController,
    CartController,
    OrderController,
    ReviewController,
    ProfileController,
    CategoryController
};
use App\Http\Controllers\Seller\ProductManageController as SellerProducts;
use App\Http\Controllers\SellerController; // контроллер магазина продавца
use App\Models\Category;
use App\Models\Country;

/*
|--------------------------------------------------------------------------
| Маршруты сайта
|--------------------------------------------------------------------------
| Здесь регистрируем все публичные и приватные маршруты.
| Для удобства: сначала идут открытые маршруты (главная, товары, категории),
| затем маршруты, доступные только авторизованным пользователям.
*/

/* ===============================
   🏠 Главная и карточки товаров
   =============================== */

// Главная страница со всеми товарами
Route::get('/', [ProductController::class, 'index'])->name('home');

// Страница товара
Route::get('/p/{product:slug}', [ProductController::class, 'show'])->name('product.show');

// Страница категории
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// Кабинет пользователя
Route::get('/cabinet', [ProfileController::class, 'cabinet'])->name('cabinet');


/* ===============================
   🔒 Авторизованные маршруты
   =============================== */
Route::middleware('auth')->group(function () {

    // 👤 Профиль
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ⭐ Избранное
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');

    // 🛒 Корзина
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cart.remove');

    // 📦 Заказы
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

    // 📝 Отзывы
    Route::post('/review/{product}', [ReviewController::class, 'store'])->name('review.store');

    // 🏪 Панель продавца
    Route::middleware('role:seller')->prefix('seller')->name('seller.')->group(function () {
        Route::get('/products',               [SellerProducts::class, 'index'])->name('products.index');
        Route::get('/products/create',        [SellerProducts::class, 'create'])->name('products.create');
        Route::post('/products',              [SellerProducts::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit',[SellerProducts::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}',     [SellerProducts::class, 'update'])->name('products.update');
        Route::delete('/products/{product}',  [SellerProducts::class, 'destroy'])->name('products.destroy');
    });
});


/* ===============================
   ⚙️ Вспомогательные API-маршруты
   =============================== */

// AJAX для подкатегорий
Route::get('/categories/{parent}/children', function (Category $parent) {
    return $parent->children()->select('id','name')->orderBy('name')->get();
})->name('categories.children');

// AJAX для городов
Route::get('/countries/{country}/cities', function (Country $country) {
    return $country->cities()->select('id','name')->orderBy('name')->get();
})->name('countries.cities');


/* ===============================
   🏬 Страница магазина продавца
   =============================== */
Route::get('/seller/{user}', [SellerController::class, 'show'])->name('seller.show');


/* ===============================
   🚪 Dashboard и авторизация
   =============================== */
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->name('dashboard');

// Маршруты аутентификации
require __DIR__ . '/auth.php';
