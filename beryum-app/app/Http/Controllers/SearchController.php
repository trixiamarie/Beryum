<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{

    function searchResults(Request $request)
    {
        $search = $request->input('query');

        $postresults = \App\Models\Post::where(function ($query) use ($search) {
            $query->where('content', 'like', '%' . $search . '%')
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        })->get();

        $userresults = \App\Models\User::where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('lastname', 'like', '%' . $search . '%');
        })->get();

        $reciperesults = \App\Models\Recipe::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        })->get();

        return view('searchresults', ['search' => $search, 'postresults' => $postresults, 'userresults' => $userresults, 'reciperesults' => $reciperesults]);
    }
}
