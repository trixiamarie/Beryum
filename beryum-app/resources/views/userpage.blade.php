<?php

use App\Models\FriendRequest;

$userId1 = $user->id;
$userId2 = auth()->id();
$exists = FriendRequest::where(function ($query) use ($userId1, $userId2) {
    $query->where('from_user_id', $userId1)
        ->where('to_user_id', $userId2)
        ->where('status', 'pending');
})->orWhere(function ($query) use ($userId1, $userId2) {
    $query->where('from_user_id', $userId2)
        ->where('to_user_id', $userId1)
        ->where('status', 'pending');
})->exists();

?>

<x-app-layout>
    @section('title', $user->name . ' ' . $user->lastname . ' - Beryum')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <!-- Modal for New Recipe -->
    <div class="modal fade" id="newRecipeModal" tabindex="-1" aria-labelledby="newRecipeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRecipeModalLabel">New Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form or information here -->
                    <div class="max-w-7xl mx-auto">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <form action="{{ route('recipe.store') }}" method="POST" class="space-y-8 divide-y divide-gray-200">
                                    @csrf
                                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                            <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Title
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input type="text" name="title" id="title" required class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Description
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <textarea name="description" id="description" rows="3" required class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="instructions" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Instructions
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <textarea name="instructions" id="instructions" rows="3" required class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="image_url" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Image URL (optional)
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input type="url" name="image_url" id="image_url" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Recipe
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Write Post -->
    <div class="modal fade" id="writePostModal" tabindex="-1" aria-labelledby="writePostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="writePostModalLabel">Write Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form or information here -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <form action="{{ route('post.store') }}" method="POST" class="space-y-6">
                                    @csrf
                                    <div>
                                        <label for="content" class="block text-sm font-medium text-gray-700">Post Content</label>
                                        <textarea id="content" name="content" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="What's on your mind?" required></textarea>
                                    </div>

                                    <div>
                                        <label for="recipe_id" class="block text-sm font-medium text-gray-700">Recipe (Optional)</label>
                                        <select id="recipe_id" name="recipe_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Select a Recipe</option>
                                            @foreach (auth()->user()->recipes as $recipe)
                                            <option value="{{ $recipe->id }}">{{ $recipe->title }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div>
                                        <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL (Optional)</label>
                                        <input type="url" id="image_url" name="image_url" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Post
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('components.carduser')
            @include('components.profileactions')

            <div>
                @if(Auth::id() == $user->id)
                @include('components.newpost')
                @endif
                @if(empty($posts) || $posts->isEmpty())
                <p>No posts available</p>
                @else
                @foreach ($posts as $post)
                @include('components.post', ['posts' => $post])
                @endforeach
                @endif
            </div>
            <div>
                
            </div>
            
        </div>
    </div>

</x-app-layout>
