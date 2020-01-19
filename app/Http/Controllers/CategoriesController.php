<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\User;
use App\Models\Link;

class CategoriesController extends Controller
{
    public function show(Topic $topic, Request $request, Category $category,User $user,Link $link)
    {
        $topics = $topic->where('category_id',$category->id)->withOrder($request->order)->paginate(10);
        $links = $link->getLinkCache();
        $active_users = $user->getActiveUsers();
        return view('topics.index',compact('topics','category','active_users','links'));
    }
}
