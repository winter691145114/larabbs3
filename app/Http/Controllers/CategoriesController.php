<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function show(Topic $topic, Request $request, Category $category)
    {
        $topics = $topic->where('category_id',$category->id)->withOrder($request->order)->paginate(10);
        return view('topics.index',compact('topics','category'));
    }
}
