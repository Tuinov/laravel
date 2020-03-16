<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'slug', 'image'];


    public function news()
    {
        return $this->hasMany(News::class, 'id');
    }


    public static function rules()
    {

        return [
            'name' => 'required|min:5',
            'slug' => 'required|max:5000',

        ];
    }


}
