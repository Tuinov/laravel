<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class News extends Model
{
    //public $timestamps = false;

    protected $fillable = ['title', 'text', 'image', 'slug', 'category_id'];


    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }

    public static function rules()
    {
        $tableCategory = (new Categories())->getTable();
       return [
           'title' => 'required|min:5',
           'text' => 'required|max:5000',
           'image' => 'mimes:jpeg,png',
           'category_id' => "required|exists:{$tableCategory},id",
       ];
    }

}
