<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoriesModel;

    public function __construct()
    {
        //  $this->middleware('auth');
        $this->categoriesModel = new Categories;
    }

    public function index()
    {
        $admin = false;
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('news.categories', compact('categories', 'admin'));
    }

    public function show($idCategory)
    {
         //$categoryName = $this->categoriesModel->getCategoryName($idCategory);
        $categoryName = DB::table('categories')->select('name')
            ->where('id', $idCategory)
            ->get()[0]->name;

        $news = News::query()->where('category_id', $idCategory)->paginate(5);

        return view('news.index', compact('news', 'categoryName'));
    }
}
