<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author', 'published_at', 'content', 'cover', 'cover_description'];
    public function price(): Attribute
    {
        return Attribute::make (
            
        function ($value){
            return $value /100;
        },
         function ($value){
            return $value *100;
        }
    );    
}
public function rating()
{
    return $this-> belongsTo(Rating::class, 'rating_fk', 'rating_id');
}

}
