<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'image', 'slug', 'category_id'];



    public function category()
    {
        return $this->belongsTo(Categories::class, 'id')->first();
    }

}
