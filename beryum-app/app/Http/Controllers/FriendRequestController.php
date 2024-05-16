<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\FriendRequest;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Strings;

class FriendRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        $friendRequests = FriendRequest::with('fromUser')
            ->where('to_user_id', $userId)
            ->where('status', 'pending')
            ->get();

         $sentfriendRequests = FriendRequest::with('toUser')
            ->where('from_user_id', $userId)
            ->where('status', 'pending')
            ->get();

        $friends = Friend::where('user_id', $userId)->with('friend')->get();

        return view('friends', ['friendrequests' => $friendRequests, 'friends' => $friends, 'sentfriendrequests' => $sentfriendRequests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'to_user_id' => 'required|exists:users,id|not_in:' . auth()->id(),
        ]);

        FriendRequest::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Friend request sent!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FriendRequest $friendRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FriendRequest $friendrequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FriendRequest $friendrequest)
    {
        if ($friendrequest->status === 'pending') {
            $friendrequest->status = 'accepted';

            $friendrequest->save();

            Friend::create([
                'user_id' => Auth::id(),
                'friend_id' => $friendrequest->fromUser->id, //Mittente della richiesta
            ]);

            return redirect()->back()->with('success', 'Friend request accepted!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FriendRequest $friendrequest)
    {
        $friendrequest->delete();

        return redirect()->back()->with('success', 'Friend request deleted successfully!');
    }
}
