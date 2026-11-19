<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'stock', 'release_date', 'description', 'cover', 'cover_description', 'rating_fk'];

    public function price(): Attribute
    {
        return Attribute::make (    
        get: fn ($value)=> $value /100,
        set: fn ($value) => $value *100,
    );  
    }
    public function rating()
    {
        return $this-> belongsTo(Rating::class, 'rating_fk', 'rating_id');
    }
    public function genres()
    {
        return $this->belongsToMany(
            Genre::class,
            'products_have_genres',
            'product_fk',
            'genre_fk',
            'id',
            'genre_id',
        );
    }

}



