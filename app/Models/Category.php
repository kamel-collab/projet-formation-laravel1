<?php

namespace App\Models;
//php artisan make:factory CategoryFactory
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function films()
    {
        return $this->hasMany(Film::class);
    }
}
