<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('dashboard', ['posts' => $posts]);
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
            'content' => 'required|string',
            'recipe_id' => 'nullable|exists:recipes,id',
            'image_url' => 'nullable|url'
        ]);

        $post = new Post([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'recipe_id' => $request->recipe_id,
            'image_url' => $request->image_url,
        ]);

        $post->save();
        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('detailpost', ['posts' =>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'content' => 'required|string',
            'recipe_id' => 'nullable|exists:recipes,id',
            'image_url' => 'nullable|url',
            'parent_post_id' =>'nullable|exists:posts,id'
        ]);

        $post->update([
            'content' => $request->content,
            'recipe_id' => $request->recipe_id,
            'image_url' => $request->image_url,
            'recipe_id' => $request->parent_post_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
    }

    // paginazione per i post in dashboard
    public function paginate(Request $request)
    {
        $posts = Post::with('user', 'recipe', 'recipe.user', 'likes','comments', 'comments.user', 'parentPost.user','post' )->orderBy('created_at', 'desc')->get();
        $user = Auth::user();

        return view('dashboard', compact('posts'), ['user' => $user]); 
    }
}
