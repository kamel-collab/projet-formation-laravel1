<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'year', 'description', 'category_id'];
    function category()
    {
        return $this->belongsTo(Category::class);
    }
}
