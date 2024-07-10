<?php

use App\Models\Friend;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

$userId = Auth::id();
$users2 = Friend::where('user_id', $userId)->with('friend')->latest()->take(5)->get();
$friendIds = Friend::where('user_id', $userId)->pluck('friend_id');

$users = User::whereNotIn('id', $friendIds)
    ->where('id', '!=', $userId)
    ->take(5)
    ->get();
$colors = Theme::all();

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Welcome - Beryum')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Link JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Link Ably -->
    <script lang="text/javascript" src="https://cdn.ably.com/lib/ably.min-1.js"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>

<body class="font-sans antialiased">
    @include('components.loginmodal')
    @include('components.registermodal')
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <div class="sidebar shadow">
            <div class="content py-6 px-4 sm:px-6 lg:px-8">

                <div class="bg-orange-400 shadow-sm rounded-lg px-6 py-3">
                    @auth
                    @include('components.sxmenu')
                    @else
                    @include('components.login')
                    @endauth
                </div>


                @include('components.footer')


            </div>
        </div>

        <div class="sidebar2 fixed right-0 top-0 h-full bgtrans shadow-lg">
            <div class="py-6 px-4 overflow-y-auto">
                @auth
                @include('components.profilecard')

                <div class="mt-6">
                    <p class="fw-bold text-white fs-3">Your Friends</p>
                    <ul class="bg-orange-400 divide-y divide-gray-200 rounded-lg shadow-sm">
                        @if($users2->count()>0)
                        @foreach($users2 as $user)
                        <div class="mt-2">
                            <div class="flex items-center justify-content-between space-x-3 p-3">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('user.show', ['user' => $user->friend->id]) }}">
                                        <img src="{{ asset($user->friend->avatar) }}" alt="Profile picture of {{ $user->friend->name }}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm me-3">
                                    </a>
                                    <a href="{{ route('user.show', ['user' => $user->friend->id]) }}" class="text-decoration-none">
                                        <h5 class="text-sm font-medium text-white">{{ $user->friend->name }} {{ $user->friend->lastname }}</h5>
                                        <p class="text-xs text-white">&#64;{{ $user->friend->username }}</p>
                                    </a>
                                </div>
                                <div class="d-flex ">

                                    <button class="mt-1 rounded-full py-1 px-3 bg-orange-500 text-white text-xs flex items-center hover:bg-orange-600 focus:outline-none focus:bg-orange-700 transition-colors">
                                        View Profile
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="p-3 text-white">You don't have any friends yet! Add some here!</p>
                        @endif
                    </ul>
                </div>
                <div class="mt-6">
                    <p class="fw-bold text-white fs-3">You might know</p>
                    <ul class="bg-orange-400 divide-y divide-gray-200 rounded-lg shadow-sm py-1 px-3">
                        @foreach($users as $user)
                        @include('components.usercard')
                        @endforeach
                    </ul>
                </div>

                @else
                <div class="bgtrans rounded-lg shadow-sm p-3 text-white">
                    <div class="flex flex-column justify-center align-items-center mx-auto">
                        <a href="https://www.linkedin.com/in/trixiamarielorenzana" target="_blank">
                            <img src="/images/trixiadeveloper.png" style="height:5rem;" alt="Logo" class="rounded-full border border-2 border-white"> </a>
                        <p class="fs-1 bold">Hello there!</p>
                    </div>

                    <p class="py-2">
                        I'm <a href="https://www.linkedin.com/in/trixiamarielorenzana" target="_blank" class="hover:bg-indigo-500 hover:text-white fw-bold px-1 rounded">Trixia Marie Lorenzana</a>, and I'm thrilled to welcome you to Beryum—my vibrant, interactive portfolio where I share my journey as a full-stack developer. But here's the twist: Beryum isn't your typical portfolio. Picture it as a cozy kitchen where I whip up delightful digital creations and share them with you, just like sharing recipes with friends.
                    </p>
                    <p>
                        I'm not only your average developer. I'm a dreamer, a creator, and a problem solver. My passion lies in blending creativity with technology. Whether I'm crafting a sleek website, cooking up a robust web application, or experimenting with the latest tech trends, I pour my heart and soul into every project, infusing it with a unique blend of innovation and imagination.
                    </p>

                </div>
                @endauth
                
            </div>
        </div>

        @endif



        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @include('components.chat')

    <!-- Link JS Bootstrap (solo se usi componenti interattivi Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const ably = new Ably.Realtime('xVLyHw.C-WaKA:sHxuPn4hvV1RIAujOiY5EPYFwyHaNQmwVkxqmsPMurQ');
        await ably.connection.once('connected');
        console.log('Connected to Ably!');
    </script>
</body>

</html>