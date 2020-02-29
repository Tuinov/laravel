<?php

namespace App\Http\Controllers\Admin;


use App\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoriesController extends BaseController
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
        $admin = true;
        $categories = DB::table('categories')->orderBy('id', 'desc')->get();
        return view('admin.index', compact('categories', 'admin'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = true;
        return view('admin.createCategory', compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->flash();

            $data = $request->input();
            unset($data['_token']);
            if (empty($data['slug'])) {
                $data['slug'] = Str::slug($data['title']);
            }
            //dd($data);
            DB::table('categories')->insert(
                $data
            );

            return redirect()->route('admin.news.index')->with(['success' => 'Успешно сохранено']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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

    public function json()
    {
        return response()->json(DB::table('news')->orderBy('id', 'desc')->get())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }

    public function file()
    {
        dd(__METHOD__);
    }
}
