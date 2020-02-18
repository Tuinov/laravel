<?php

namespace App\Http\Controllers;

use App\News;
//use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $newsModel;

    public function __construct()
    {
        //  $this->middleware('auth');
        $this->newsModel = new News;
    }

    public function index()
    {
        $admin = false;
        $categories = $this->newsModel->getAllCategories();
        return view('news.categories', compact('categories', 'admin'));
    }

    public function show($idCategory)
    {
         $categoryName = $this->newsModel->getCategoryName($idCategory);
        $news = $this->newsModel->getNewsCategory($idCategory);
        return view('news.index', compact('news', 'categoryName'));
    }
}
