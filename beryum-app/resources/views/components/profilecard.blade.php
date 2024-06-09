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

<div class="bg-orange-400 shadow-md rounded-lg p-4 text-white">
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
                    <button class="inline-flex items-center px-3 py-2 shadow-md text-sm leading-4 font-medium rounded-md text-white bgtrans2 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
                            <path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5m0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78zM5.048 3.967l-.087.065zm-.431.355A4.98 4.98 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8zm.344 7.646.087.065z" />
                        </svg>

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