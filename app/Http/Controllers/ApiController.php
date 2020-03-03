<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function create(Request $request)
    {

        $news = new News();


        $news->title = $request->input('title');
        $news->text = $request->input('text');
        $news->image = $request->input('image');
        $news->slug = $request->input('slug');
        $news->category_id = $request->input('category_id');

        $news->save();
        return response()->json($news);
    }
}