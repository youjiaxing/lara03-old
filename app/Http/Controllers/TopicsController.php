<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\TopicRequest;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Request $request)
	{
		$topics = Topic::withOrder($request->order)->paginate(30);
		return view('topics.index', compact('topics'));
	}

    public function show(Topic $topic, Request $request)
    {
        // URL 矫正
        if (!empty($topic->slug) && $topic->slug != $request->slug) {
            return redirect($topic->link(), 301);
        }

        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic)
	{
        $categories = Category::all();
		return view('topics.create_and_edit', compact('topic', 'categories'));
	}

	public function store(TopicRequest $request)
	{
	    $topic = \Auth::user()->topics()->create($request->all());
		return redirect()->to($topic->link())->with('message', '成功创建话题');
	}

	public function edit(Topic $topic)
	{
        $this->authorize('update', $topic);
        $categories = Category::all();
		return view('topics.create_and_edit', compact('topic', 'categories'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
		$this->authorize('update', $topic);
		$topic->update($request->all());

		return redirect()->to($topic->link())->with('message', '更新成功!');
	}

	public function destroy(Topic $topic)
	{
		$this->authorize('destroy', $topic);
		$topic->delete();

		return redirect()->route('topics.index')->with('message', '成功删除!');
	}

	public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据, 默认是失败的
        $data = [
            'success' => false,
            'msg' => '上传失败',
            'file_path' => ''
        ];

        // 判断是否有上传文件，并赋值给 $file
        if ($request->hasFile('upload_file')) {
            // 保存图片到本地
            $result = $uploader->save($request->file('upload_file'), 'topics', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['success'] = true;
                $data['msg'] = '上传成功!';
                $data['file_path'] = $result['path'];
            }

        }
        return $data;
    }
}