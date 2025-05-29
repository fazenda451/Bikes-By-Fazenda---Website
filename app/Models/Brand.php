<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Brand extends Model
{
    use HasFactory;
    
    protected $fillable = ['brand_name'];
    
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->brand_name,
        );
    }
}
