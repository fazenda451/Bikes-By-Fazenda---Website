<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'discount_percentage',
        'category_id',
        'Quantity',
        'size'
    ];
    
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relacionamento: avaliações do produto
     */
    public function ratings()
    {
        return $this->hasMany(ProductRating::class);
    }
    
    /**
     * Check if product has a discount
     */
    public function hasDiscount()
    {
        return $this->discount_percentage > 0;
    }
    
    /**
     * Get the discounted price
     */
    public function getDiscountedPrice()
    {
        if ($this->hasDiscount()) {
            return $this->price - ($this->price * ($this->discount_percentage / 100));
        }
        return $this->price;
    }
    
    /**
     * Get the discount amount
     */
    public function getDiscountAmount()
    {
        if ($this->hasDiscount()) {
            return $this->price * ($this->discount_percentage / 100);
        }
        return 0;
    }
    
    /**
     * Scope for products with discounts
     */
    public function scopeWithDiscount($query)
    {
        return $query->where('discount_percentage', '>', 0);
    }
}
