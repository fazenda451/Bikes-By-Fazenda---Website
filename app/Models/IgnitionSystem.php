<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class IgnitionSystem extends Model
{
    use HasFactory;
    
    protected $fillable = ['system'];
    
    /**
     * Get the name attribute (alias for system).
     */
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->system,
        );
    }
}
