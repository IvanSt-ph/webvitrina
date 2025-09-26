<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController, FavoriteController, CartController, OrderController, ReviewController, ProfileController};
use App\Http\Controllers\Seller\ProductManageController as SellerProducts;

Route::get('/', [ProductController::class,'index'])->name('home');
Route::get('/p/{product:slug}', [ProductController::class,'show'])->name('product.show');

Route::get('/cabinet', [ProfileController::class, 'cabinet'])->name('cabinet');


Route::middleware('auth')->group(function(){
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::get('/favorites', [FavoriteController::class,'index'])->name('favorites.index');
  Route::post('/favorites/{product}', [FavoriteController::class,'toggle'])->name('favorites.toggle');

  Route::get('/cart', [CartController::class,'index'])->name('cart.index');
  Route::post('/cart/add/{product}', [CartController::class,'add'])->name('cart.add');
  Route::patch('/cart/{item}', [CartController::class,'update'])->name('cart.update');
  Route::delete('/cart/{item}', [CartController::class,'remove'])->name('cart.remove');

  Route::get('/orders', [OrderController::class,'index'])->name('orders.index');
  Route::post('/checkout', [OrderController::class,'checkout'])->name('checkout');

  Route::post('/review/{product}', [ReviewController::class,'store'])->name('review.store');

  Route::middleware('role:seller')->prefix('seller')->name('seller.')->group(function(){
    Route::get('/products', [SellerProducts::class,'index'])->name('products.index');
    Route::get('/products/create', [SellerProducts::class,'create'])->name('products.create');
    Route::post('/products', [SellerProducts::class,'store'])->name('products.store');
    Route::get('/products/{product}/edit', [SellerProducts::class,'edit'])->name('products.edit');
    Route::put('/products/{product}', [SellerProducts::class,'update'])->name('products.update');
    Route::delete('/products/{product}', [SellerProducts::class,'destroy'])->name('products.destroy');
  });
});


Route::get('/dashboard', function () {
    return redirect()->route('home'); // или верни свою страницу
})->name('dashboard');


Route::get('/categories/menu', [\App\Http\Controllers\CategoryController::class, 'menu'])
    ->name('categories.menu');





require __DIR__.'/auth.php';
