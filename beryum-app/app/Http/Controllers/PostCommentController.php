<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use App\Http\Requests\StorePostCommentRequest;
use App\Http\Requests\UpdatePostCommentRequest;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PostComment $postComment)
    {

        $postId = $request->post_id;
        $request->validate([
            'comment' => 'required|string',
            'post_id' => 'required'
        ]);

        $comment = new PostComment($request->all());
        $comment->user_id = auth()->id(); 
        $comment->save();

        return redirect()->route('post.show', ['post' => $postId]);

    }

    /**
     * Display the specified resource.
     */
    public function show(PostComment $postComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostComment $postComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostCommentRequest $request, PostComment $postComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostComment $postComment)
    {
        //
    }
}
