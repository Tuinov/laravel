<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\Categories;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends BaseController
{

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::query()->orderBy('id', 'desc')->paginate(5);
        return view('news.index', compact('news'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();

        //dd($categories);
        return view('admin.createNews', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // if($request->isMethod('post')) {}
        //$request->flash();

        $array = [];
        foreach ($request as $key=>$value) {
            $array[$key] = $value;
        }
        dd($array);

        $news = new News();

        if (! $request->input('slug')) {
            $news->slug = Str::slug($request->input('title'));
        }

        if ($request->file('image')) {
            $path = \Storage::putFile('public', $request->file('image'));
            $url = \Storage::url($path);
            $news->image = $url;
        }

        $this->validate($request, News::rules());
        $result = $news->fill($request->all())->save();

        if ($result) {
            return redirect()->route('admin.news.index')
                ->with(['success' => 'Успешно сохранено']);

        } else {
            return redirect()->route('admin.news.create')
                ->with(['danger' => 'ошибка сохранения!!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {

        return view('news.show', ['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Categories::all();
        //$request->flash();
        //dd($categories);
        return view('admin.createNews', compact('news','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //dd($request->text, $news);
        $this->validate($request, News::rules());
        $result = $news->fill($request->all())->update();

        return redirect()->route('admin.news.index')->with(['success' => 'Успешно изменено']);

        //dd(__METHOD__, $news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($news)
    {

        //dd(__METHOD__, $news);
        News::query()->where('id', '=', $news)->delete();
        return redirect()->route('admin.news.index')->with(['success' => 'Новость успешно удалена!']);

    }
}
