<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CategoriesController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$routeCategoryId = route('categories.show');
        $html = '<h1> Категории </h1>';
      foreach ($this->categories as $category) {
          $html .= <<<php
    <h1><a href="/admin/categories/{$category['id']}">{$category['name']}</a></h1>
php;
       }
        $html .= <<<php
    <a href="/">На главную</a>
php;
    return $html;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idCategory = null)
    {
        $categoryName = $this->getNameCategory($idCategory);

        $html = '<h1> Новости из категории: '. $categoryName .'</h1>';

        foreach ($this->news as $news) {
            if($news['category'] == $idCategory) {
                $html .= <<<php
    <h1><a href="/admin/news/{$news['id']}">{$news['title']}</h1></a>
php;
            }
        }
        $html .= <<<php
    <a href="/">На главную</a>
php;
        return $html;
    }

    public function getNameCategory($idCategory) {

        foreach ($this->categories as $category) {
            if($category['id'] == $idCategory) {
                return $category['name'];
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(__METHOD__);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
