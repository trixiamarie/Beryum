<?php

namespace App\Http\Controllers;

use App\Models\PostLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostLikeController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
        ]);
    
        $postId = $request->post_id;
        $userId = Auth::id();
    
        $existingLike = PostLike::where('post_id', $postId)->where('user_id', $userId)->first();
    
        if ($existingLike) {
            return response()->json(['message' => 'You already liked this post'], 409);
        }
    
        $postLike = new PostLike();
        $postLike->post_id = $postId;
        $postLike->user_id = $userId;
        $postLike->save();
    
        return response()->json(['message' => 'Post liked successfully'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostLike $postLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostLike $postLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostLike $postLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostLike $postLike)
    {
        if (Auth::id() !== $postLike->user_id) {
            abort(403, 'Unauthorized action.');
        }
    
        $postLike->delete();
    
        return response()->json(['message' => 'Like removed successfully'], 200);
    }
}
