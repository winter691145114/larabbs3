<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Category;
use App\Models\User;
use App\Models\Link;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use App\Handlers\ImageUploadHandler;

use Auth;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Topic $topic, Request $request,User $user,Link $link)
	{
		$topics = $topic->withOrder($request->order)->paginate();
        $links = $link->getLinkCache();

        $active_users = $user->getActiveUsers();
		return view('topics.index', compact('topics','active_users','links'));
	}

    public function show(Topic $topic, Request $request)
    {
        if(!empty($topic->slug) && $topic->slug != $request->slug)
        {
            return redirect($topic->link(), 301);
        }
        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic, Category $category)
	{
        $categories = Category::all();
		return view('topics.create_and_edit', compact('topic','categories'));
	}

	public function store(TopicRequest $request,Topic $topic)
	{
		$topic = $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();
		return redirect()->to($topic->link())->with('success', '话题创建成功.');
	}



	public function edit(Topic $topic,Category $category)
	{
        $this->authorize('update', $topic);
        $categories = Category::all();
		return view('topics.create_and_edit', compact('topic','categories'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->to($topic->link())->with('success', '话题更新成功.');
	}

    public function uploadImage(ImageUploadHandler $uploader,Request $request )
    {
        $data = [
            'success' => false,
            'msg' => '上传失败',
            'file_path' => ''
        ];
        if($file = $request->upload_file)
        {
            $result = $uploader->save($request->upload_file,'topics',\Auth::id(),1024);
            if($result)
            {
                $data['success'] = true;
                $data['msg'] = '上传成功';
                $data['file_path'] = $result['path'];
            }
        }
        return $data;
    }

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('success', '帖子删除成功.');
	}
}
