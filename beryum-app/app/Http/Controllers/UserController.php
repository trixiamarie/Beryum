<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\FriendRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        $posts = Post::where('user_id', $user->id)->with('user')->orderBy('created_at', 'desc')->get();

        $userId = auth()->id();

        $isFriend = Friend::where('user_id', $userId)
        ->where('friend_id', $user->id)
        ->exists();

        $friendrequest = FriendRequest::where('from_user_id', $userId)
                                ->where('to_user_id', $user->id)
                                ->where('status', 'pending')
                                ->get();

        $friendrequestincoming = FriendRequest::where('from_user_id', $user->id)
                        ->where('to_user_id', $userId)
                        ->where('status', 'pending')
                        ->get();

        return view('userpage', compact('user', 'posts','isFriend', 'friendrequest', 'friendrequestincoming'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
