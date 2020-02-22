<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private $news = [
        [
            'id' => 1,
            'title' => 'выборы',
            'text' => 'выборы состоялись!!',
            'category' => 1
        ],
        [
            'id' => 2,
            'title' => 'спортивная новость',
            'text' => 'Победу одержал наш чемпион!!',
            'category' => 2
        ],
        [
            'id' => 3,
            'title' => 'президент',
            'text' => 'путин опять что-то пообещал',
            'category' => 1
        ]
    ];

    protected $categories = [
        [
            'id' => 1,
            'name' => 'политика',
            'slug' => 'politika'
        ],
        [
            'id' => 2,
            'name' => 'спорт',
            'slug' => 'sport'
        ],
        [
            'id' => 3,
            'name' => 'наука',
            'slug' => 'nauka'
        ]
    ];

    public function getAllNews()
    {
        return $this->news;
    }

    public function getOneNews($id)
    {
        foreach ($this->news as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }

    }

    public function getAllCategories()
    {
        return $this->categories;
    }

    public function getNewsCategory($idCategory)
    {
        $news = [];
        foreach ($this->news as $item) {
            if ($item['category'] == $idCategory) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getCategoryName($id)
    {
        foreach($this->categories as $category) {
            if($category['id'] = $id){
                return $category['name'];
            }
        }
    }

    public function addNews($news)
    {
        $news['id']  = count($this->news) + 1;
        $this->news[] = $news;
    }

}
