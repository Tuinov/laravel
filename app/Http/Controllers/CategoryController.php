<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        //  $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categories::query()->orderBy('id', 'desc')->get();
        return view('news.categories', compact('categories'));
    }

    public function show($idCategory)
    {

        $categoryName = Categories::query()->select('name')
            ->where('id', $idCategory)
            ->get()[0]->name;

        $news = News::query()->where('category_id', $idCategory)->paginate(5);

        return view('news.index', compact('news', 'categoryName'));
    }
}
