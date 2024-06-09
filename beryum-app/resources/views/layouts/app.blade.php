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

    <script>
        
    </script>
    <style>
        .sidebar {
            position: fixed;

            left: 0;

            top: 0;

            width: 29rem;

            height: 100vh;

            overflow-y: auto;

            z-index: 1000;
            background: rgb(234, 88, 12);
            background: -moz-linear-gradient(183deg, rgba(234, 88, 12, 1) 26%, rgba(234, 123, 12, 1) 58%);
            background: -webkit-linear-gradient(183deg, rgba(234, 88, 12, 1) 26%, rgba(234, 123, 12, 1) 58%);
            background: linear-gradient(183deg, rgba(234, 88, 12, 1) 26%, rgba(234, 123, 12, 1) 58%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ea580c", endColorstr="#ea7b0c", GradientType=1);
        }

        .sidebar2 {
            width: 29rem;

            height: 100vh;

            overflow-y: auto;

            z-index: 1000;
            background: rgb(234, 88, 12);
            /* background: -moz-linear-gradient(183deg, rgba(234, 88, 12, 1) 26%, rgba(234, 123, 12, 1) 58%);
            background: -webkit-linear-gradient(183deg, rgba(234, 88, 12, 1) 26%, rgba(234, 123, 12, 1) 58%);
            background: linear-gradient(183deg, rgba(234, 88, 12, 1) 26%, rgba(234, 123, 12, 1) 58%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ea580c", endColorstr="#ea7b0c", GradientType=1); */
            background: linear-gradient(183deg, rgba(234, 88, 12, 1) 26%, rgb(234 88 12) 58%);
        }

        .content {
            height: 100%;

        }

        .bgtrans {
            background-color: #ea7b0c9c;

        }

        .bgtrans2 {
            background-color: #EA580C;
        }

        body {
            margin-left: 452px;
            margin-right: 452px;
           
            /*background-color: #EA580C;*/
             background-color: #ff9036; 

        }

        /* Stile per la scrollbar di base */
        ::-webkit-scrollbar {
            width: 12px;
            /* Larghezza della barra di scorrimento */
        }

        /* Maniglia della scrollbar */
        ::-webkit-scrollbar-thumb {
            background-color: #4B5563;
            /* Colore della maniglia */
            border-radius: 6px;
            /* Bordi arrotondati della maniglia */
            border: 3px solid transparent;
            /* Distanza tra la maniglia e la traccia */
            background-clip: padding-box;
        }

        /* Traccia della scrollbar */
        ::-webkit-scrollbar-track {
            background: #F9FAFB;
            /* Colore dello sfondo della traccia */
            border-radius: 6px;
            /* Bordi arrotondati della traccia */
        }

        a:hover {
            color: #312E81;
        }

        .navbarcustom {
            display: none;
        }

        @media (max-width: 1400px) {

            .sidebar,
            .sidebar2 {
                display: none;
            }

            body {
                margin: auto;
                margin-top: 4rem;
            }

            .navbarcustom {
                display: block;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 4rem;
                background-color: #333;
                color: white;
                z-index: 1001;
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animated-arrow {
            animation: bounce 1s infinite;
        }
    </style>
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
                    <ul class="divide-y divide-gray-200">
                        <!-- Home -->
                        <li>
                            <a href="/dashboard" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                                </svg>
                                <span class="mx-2">Home</span>
                            </a>
                        </li>
                        <!-- My Profile -->
                        <li>
                            <a href="/myprofile" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                </svg>
                                <span class="mx-2">My Profile</span>
                            </a>
                        </li>
                        <!-- My Recipes -->
                        <li>
                            <a href="{{route('myrecipes.index')}}" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                                    <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    <path d="M13.997 5.17a5 5 0 0 0-8.101-4.09A5 5 0 0 0 1.28 9.342a5 5 0 0 0 8.336 5.109 3.5 3.5 0 0 0 5.201-4.065 3.001 3.001 0 0 0-.822-5.216zm-1-.034a1 1 0 0 0 .668.977 2.001 2.001 0 0 1 .547 3.478 1 1 0 0 0-.341 1.113 2.5 2.5 0 0 1-3.715 2.905 1 1 0 0 0-1.262.152 4 4 0 0 1-6.67-4.087 1 1 0 0 0-.2-1 4 4 0 0 1 3.693-6.61 1 1 0 0 0 .8-.2 4 4 0 0 1 6.48 3.273z" />
                                </svg>
                                <span class="mx-2">My Recipes</span>
                            </a>
                        </li>
                        <!-- Saved Recipes -->
                        <li>
                            <a href="#" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save-fill" viewBox="0 0 16 16">
                                    <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293z" />
                                </svg>
                                <span class="mx-2">Saved Recipes</span>
                            </a>
                        </li>
                        <!-- Latest Recipes -->
                        <li>
                            <a href="{{route('recipe.index')}}" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                                    <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5z" />
                                </svg>
                                <span class="mx-2">Explore Recipes</span>
                            </a>
                        </li>
                        <!-- My Meal Calendar -->
                        <li>
                            <a href="#" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-heart-fill" viewBox="0 0 16 16">
                                    <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                                </svg>
                                <span class="mx-2">My Meal Calendar</span>
                            </a>
                        </li>
                        <!-- Friends -->
                        <li>
                            <a href="{{route('friendrequest.index')}}" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5" />
                                </svg>
                                <span class="mx-2">Friends</span>
                            </a>
                        </li>
                        <!-- Groups -->
                        <li>
                            <a href="#" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg>
                                <span class="mx-2">Groups</span>
                            </a>
                        </li>
                        <!--Chat-->
                        <li class="hover:text-white">
                            <a href="{{route('messages.index')}}" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots-fill" viewBox="0 0 16 16">
                                    <path d="M16 8c0 3.866-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7M5 8a1 1 0 1 0-2 0 1 1 0 0 0 2 0m4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg>
                                <span class="mx-2">Messages</span>
                            </a>
                        </li>

                        <!--Notifications-->
                        <li class="hover:text-white">
                            <a href="#" class="block p-3 hover:bg-orange-600 rounded-md text-white hover:text-white flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                                </svg>
                                <span class="mx-2">Notifications</span>
                            </a>
                        </li>

                        <li class="relative pt-2">
                            <form action="/search" method="GET" class="flex items-center">
                                <input type="text" name="query" placeholder="Search..." class="pl-10 pr-3 py-2 w-full bgtrans border border-gray-300 rounded-md text-sm placeholder-white text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 ease-in-out" style="padding-right: 2.5rem;">
                                <button type="submit" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search text-white hover:text-white transition duration-150 ease-in-out" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </button>
                            </form>
                        </li>

                    </ul>
                    @else
                    <div class="container text-white">
                        <div style="height:60vh;" class="flex justify-content-center align-items-center">
                            <div class="text-center">
                                <p class="text-center fw-bold pb-3" style="font-weight: 700;font-size: 2rem;">Welcome to Beryum!</p>
                                <p>Try the website!</p>
                                <p class="text-center py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-down d-block mx-auto animated-arrow" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1" />
                                    </svg>
                                </p>
                                <button type="button" class="py-3 px-5 rounded-lg shadow-sm bg-orange-600 text-white hover:text-gray-100 hover:bg-orange-500" data-bs-toggle="modal" data-bs-target="#modalLogin">
                                    <a href="#" class="hover:text-white">Login</a>
                                </button>
                                <p>or</p>
                                <button type="button" class="py-3 px-5 rounded-lg shadow-sm bg-orange-600 text-white hover:text-gray-100 hover:bg-orange-500" data-bs-toggle="modal" data-bs-target="#modalRegister">
                                    <a href="#" class="text-white">Register</a>
                                    <button>
                            </div>
                        </div>
                    </div>
                    @endauth
                </div>

                <!-- Logo -->
                <div class="shrink-0 flex items-center justify-content-center my-3">
                    <a href="{{ route('dashboard') }}">
                        <img src="/images/logowhite.PNG" style="height:5rem;" alt="Logo">
                    </a>
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
                    <ul class="bg-orange-400 divide-y divide-gray-200 rounded-lg shadow-sm">
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