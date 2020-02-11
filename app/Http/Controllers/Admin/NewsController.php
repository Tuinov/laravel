<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class NewsController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $html = <<<php
    <a href="/">На главную</a>
php;
        foreach ($this->news as $news) {

                $html .= <<<php
    <h1>{$news['title']}</h1>
    <h3>{$news['text']}</h3>
php;

        }
        $html .= <<<php
    <a href="news/create">добавить новость</a>
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
        return 'создать новость';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__, $this->news, $this->categories);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $html = <<<php
    <a href="/">На главную</a>
php;
        foreach ($this->news as $news) {
            if($news['id'] == $id) {
                $html .= <<<php
    <h1>{$news['title']}</h1>
    <h3>{$news['text']}</h3></a>
php;
            }
        }
        return $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd(__METHOD__, $this->news, $this->categories);
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
        dd(__METHOD__, $this->news, $this->categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__, $this->news, $this->categories);
    }
}
