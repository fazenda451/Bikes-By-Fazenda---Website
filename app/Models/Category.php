<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        
    ];
    
    /**
     * Obtém os produtos associados a esta categoria.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
