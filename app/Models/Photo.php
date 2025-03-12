<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'motorcycle_id', 
        'image'
    ];

    public function motorcycle()
{
    return $this->belongsTo(Motorcycle::class);
}

}
