<?php


namespace App\Service;

use Illuminate\Support\Str;
use App\Categories;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link)
    {
        $xml = XmlParser::load($link);
        dd($xml);
        $data = $xml->parse([
            'category' => ['uses' => 'channel.title'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]'],
        ]);

// Если категория существует находим её. Если нет, то создаём
        if(Categories::isCategoryInDB($data['category'])) {
            $category = Categories::query()
                ->where('name', $data['category'])
                ->first();

        } else {

            $category = new Categories();
            $category->name = $data['category'];
            $category->slug = Str::slug($data['category']);
            //$category->save();
        }


        $news = [];
        foreach ($data['news'] as $key => $value) {

            $item = new News();

            $item->title = $value['title'];
            $item->text = $value['description'];
            $item->image = $data['image'];
            $item->slug = Str::slug($value['title']);
            $item->category_id = $category->id;
            $item->user_id = \Auth::id();
            // $item->save();
            $news[] = $item;
        }
        dump($category, $news);
        //\Storage::disk('publicLog')->append('log.txt', date('c') . $link);


        //DB::table('news')->insert($news);

        //$categoryName = $data['category'];
        // return view('admin.ParserIndex', compact('categoryName', 'news'));
    }
}