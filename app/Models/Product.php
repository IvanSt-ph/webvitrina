<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'price',
        'stock',
        'image',
        'description',
        'city_id',
        'gallery',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'gallery' => 'array',
        ];
    }

    // 🔹 Продавец
    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // 🔹 Отзывы
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // 🔹 Категория
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 🔹 Город
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // 🔹 Страна через город
    public function country()
    {
        return $this->hasOneThrough(
            Country::class,
            City::class,
            'id',         // Foreign key в cities (city_id в products → id в cities)
            'id',         // Foreign key в countries (country_id в cities → id в countries)
            'city_id',    // Local key в products
            'country_id'  // Local key в cities
        );
    }

    // 🔹 Автогенерация slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title) . '-' . uniqid();
            }
        });

        static::updating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title) . '-' . uniqid();
            }
        });
    }

public function getImageUrlAttribute()
{
    return $this->image
        ? asset('storage/' . ltrim($this->image, '/'))
        : asset('images/no-image.png');
}




}
