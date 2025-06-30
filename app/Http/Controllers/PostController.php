<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        // 最新の投稿を取得
        $posts = Post::latest()->get();

        // 'index' ビューに投稿を渡す
        return view('index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {


        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.index');
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(PostRequest $request, Post $post)
    {

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }


}