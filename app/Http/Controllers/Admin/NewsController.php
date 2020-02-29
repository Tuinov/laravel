<?php

namespace App\Http\Controllers\Admin;

use App\News;
use App\Categories;
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
        $admin = true;
        //dd($news);
        return view('news.index', compact('news', 'admin'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::query()->select('name')->get();

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
        $request->flash();

        $data = $request->input();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->file('image')) {
            $path = \Storage::putFile('public', $request->file('image'));
            $url = \Storage::url($path);
            $data['image'] = $url;
        }

        //dd($data);
        DB::table('news')->insert(
            $data
        );

        return redirect()->route('admin.news.index')->with(['success' => 'Успешно сохранено']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $admin = true;
        //$news = DB::table('news')->find($id);
        //dd($news);
        return view('news.show', compact('news', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = (new Categories)->getAllCategories();
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
        $news::delete();
        return redirect()->route('admin.news.index')->with(['success' => 'Успешно сохранено']);

    }
}
