<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'parent_id',
        'keywords',
        'description',
        'slug',
        'image',
        'status',
    ];

    #One To Many (Parent)
    public function products(){
        return $this->hasMany(Product::class);
    }

    #Prent category with id 0 has one parent
    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    #Parent category with id 0 has many children categories
    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }
}
