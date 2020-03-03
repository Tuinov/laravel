<?php

namespace App\Http\Controllers\Admin;


use App\Categories;
use App\News;
use Illuminate\Support\Str;
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
        $categories = Categories::query()->orderBy('id', 'desc')->get();
        return view('news.categories', compact('categories', 'admin'));

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $request->flash();

            $categories = new Categories();

            if ($request->input('slug')) {
                $categories->slug = Str::slug($request->input('title'));
            }

            $this->validate($request, Categories::rules());
            $result = $categories->fill($request->all())->save();

            if ($result) {
                return redirect()->route('admin.categories.index')
                    ->with(['success' => 'Успешно сохранено']);

            } else {
                return redirect()->route('admin.categories.create')
                    ->with(['danger' => 'ошибка сохранения!!']);
            }

           }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        dd(__METHOD__,$category );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
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
