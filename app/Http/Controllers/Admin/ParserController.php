<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $xml = XmlParser::load('https://news.yandex.ru/auto.rss');

        $data = $xml->parse([
            'category' => ['uses' => 'channel.title'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]'],
        ]);
        $news = [];
        foreach ($data['news'] as $key => $value) {

            $item = new News();
            $item->id = ++$key;
            $item->title = $value['title'];
            $news[] = $item;
        }

        $categoryName = $data['category'];
        return view('admin.ParserIndex', compact('categoryName', 'news'));
    }
}
