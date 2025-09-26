<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    'country',
];


    // Продавец, которому принадлежит товар
    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Отзывы на товар
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    protected function casts(): array
{
    return [
        'price' => 'decimal:2',
    ];
}

public function category()
{
    return $this->belongsTo(Category::class);
}


}
