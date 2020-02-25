<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function getAllCategories()
    {
        return $this->all();
    }

    public function getNewsCategory($idCategory)
    {
        $news = DB::select('select * from news where category_id = :id',
            ['id' => $idCategory]);

        return $news;
    }

    public function getCategoryName($id)
    {
//        $name = DB::select('select name from categories where id = :id',
//            ['id' => $id])[0]
//        ->name;
        $name = DB::table('categories')->where('id', $id)->value('name');
        //dd($name);
        return $name;


    }
}
