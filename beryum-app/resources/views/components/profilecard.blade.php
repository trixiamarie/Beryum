<?php

use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

$user = Auth::user();

$myrecipes = Recipe::where('user_id', $user->id)
    ->with('user')
    ->latest()
    ->take(5)
    ->get();

?>

<div class="bgtrans shadow-md rounded-lg p-4 text-white">
    <div class="flex items-center">
        <a href="{{route('user.show', ['user' => $user->id])}}" class="block">
            <img src="{{ asset($user->avatar) }}" alt="user" class="w-12 h-12 rounded-full mr-2">
        </a>

        <div class="flex-grow">
            <a href="{{route('user.show', ['user' => $user->id])}}" class="block hover:text-orange-100">
                <h5 class="text-lg font-semibold mb-0">{{ $user->name }} {{$user->lastname}}</h5>
                <p>&#64;{{$user->username}}</p>
            </a>
            <a href="{{route('user.show', ['user' => $user->id])}}" class="block">
                <p class="text-sm text-gray-500 mb-0">{{ $user->role }}</p>
            </a>
        </div>

        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile Settings') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

    </div>
    <!-- <div class="mt-3 hidden lg:flex justify-between items-center">
        <div>
            <p class="text-sm text-gray-100 mb-0">Additional details here</p>
        </div>
        <div>
            <button class="py-2 px-4 flex items-center text-sm font-medium text-gray-100">
                <span class="ml-2">View Profile</span>
            </button>
        </div>
    </div> -->
    <div>
        <p>
            @if(empty($myrecipes) || $myrecipes->isEmpty())
            You don't have any recipes yet.
            @else
        <p class="fw-bold mt-3">Your latest recipes!</p>
        @foreach($myrecipes as $myrecipe)
        <a href="{{route('recipe.show', ['recipe' => $myrecipe->id])}}">
            <div class="card mb-3 bgtrans2 border border-0 shadow-sm hover:bg-orange-700 hover:text-white" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $myrecipe->image_url }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $myrecipe->title}}</h5>
                            <!-- <p class="text-gray-100">{{ $myrecipe->user->name}} {{ $myrecipe->user->lastname}} ({{ $myrecipe->user->username}})</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        @endif
        </p>
    </div>
</div>