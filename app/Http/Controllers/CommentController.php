<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        return response()->json($post->comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
       $request->validate([
        'body' => 'required|string|max:1000',
       ]);

       $comment = new Comment();
       $comment->body = $request->body;
       $comment->post_id = $post->id;
       $comment->save();

       return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, Comment $comment)
    {
        return response()->json($comment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comment->update($validated);

        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show', $post);
    }
}
