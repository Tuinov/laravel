<?php

namespace App\Http\Controllers;

use App\Categories;
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
        $categories = $this->categoriesModel->getAllCategories();
        return view('news.categories', compact('categories', 'admin'));
    }

    public function show($idCategory)
    {
         $categoryName = $this->categoriesModel->getCategoryName($idCategory);
        $news = $this->categoriesModel->getNewsCategory($idCategory);
        return view('news.index', compact('news', 'categoryName'));
    }
}
