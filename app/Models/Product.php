<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'keywords',
        'description',
        'image',
        'category_id',
        'user_id',
        'price',
        'quantity',
        'minquantity',
        'tax',
        'detail',
        'slug',
        'status',
    ];

    #Many to One(Child)
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
