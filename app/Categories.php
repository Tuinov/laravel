<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'slug'];


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

    public static function isCategoryInDB($categoryName) {
        if(! empty(DB::table('categories')->where('name', $categoryName))) {
            return true;
        } else
            return false;
    }
}
