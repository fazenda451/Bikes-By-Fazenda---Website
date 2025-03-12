<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class LicenseType extends Model
{
    use HasFactory;
    
    protected $fillable = ['type'];
    
    /**
     * Get the name attribute (alias for type).
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->type,
        );
    }
}
