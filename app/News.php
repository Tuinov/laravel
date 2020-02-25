<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{


    public function getAllNews()
    {
        return $this->orderBy('id', 'desc')
            ->get();
    }

    public function getOneNews($id)
    {
        return $this->find($id);

    }



    public function addNews($news)
    {
        //dd($news);
        $path = \Storage::putFile('public', $news['image']);
        $url = \Storage::url($path);
        $news['url']  = $url;
        $news['id']  = count($this->news) + 1;
        $this->news[] = $news;
    }

}
