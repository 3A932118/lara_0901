<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        $data = ['posts' => $posts];
        return view('admin.posts.index', $data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'is_feature' => 'required|Boolean',
        ]);
        Post::create($request->all());
        // 將 View 送出的表單資料跟 Post 這個 Model 連接(Model 用來存取資料表)，進行新增
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $data = ['post' => $post];
        return view('admin.posts.edit', $data);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:255',
            'content' => 'required',
            'is_feature' => 'required|Boolean',
        ]);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
