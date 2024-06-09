<x-app-layout>
    @section('title', 'Friends - Beryum')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bgtrans shadow-md rounded-lg mt-6 p-6">
                <p class="font-semibold text-xl text-white">My Friends Requests</p>
                @if(session('success'))
                <p class="p-3 bg-orange-600 text-white rounded-lg shadow-sm">Friend Request Accepted</p>
                @endif
                @if($friendrequests->count() > 0 || !$friendrequests)
                @foreach ($friendrequests as $request)
                @include('components.friendrequest')
                @endforeach
                @else
                <p class="text-gray-100">You don't have any friend request for now!</p>
                @endif
            </div>

            <div class="bgtrans shadow-md rounded-lg mt-6 p-6">
                <p class="font-semibold text-xl text-white">My Sent Friend Requests</p>
                @if($sentfriendrequests->count()>0)
                @foreach($sentfriendrequests as $friend)
                <div class="mt-2">
                    <div class="flex items-center justify-content-between space-x-3 p-3 shadow-md rounded-lg bgtrans2">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('user.show', ['user' => $friend->toUser->id]) }}">
                                <img src="{{ asset($friend->toUser->avatar) }}" alt="Profile picture of {{ $friend->toUser->name }}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm me-2">
                            </a>
                            <a href="{{ route('user.show', ['user' => $friend->toUser->id]) }}" class="text-decoration-none">
                                <h5 class="text-sm font-medium text-white">{{ $friend->toUser->name }} {{ $friend->toUser->lastname }}</h5>
                                <p class="text-xs text-white">&#64;{{ $friend->toUser->username }}</p>
                            </a>
                        </div>
                        <div class="d-flex ">

                            <button class="mt-1 rounded-full py-1 px-3 bg-orange-500 text-white text-xs flex items-center hover:bg-orange-600 focus:outline-none focus:bg-orange-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill me-2" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                </svg>
                                Delete Friend Request
                            </button>
                        </div>
                    </div>
                </div>

                @endforeach
                @else
                <p class="text-gray-100">You didn't send any friend requests for now! Send some!</p>
                @endif
            </div>

            <div class="bgtrans shadow-md rounded-lg mt-6 p-6">
                <p class="font-semibold text-xl text-white">My Friends</p>
                @if($friends->count()>0)
                @foreach($friends as $friend)
                <div class="mt-2">
                    <div class="flex items-center justify-content-between space-x-3 p-3">
                        <div class="d-flex align-items-center">
                            <a href="{{ route('user.show', ['user' => $friend->friend->id]) }}">
                                <img src="{{ asset($friend->friend->avatar) }}" alt="Profile picture of {{ $friend->friend->name }}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm">
                            </a>
                            <a href="{{ route('user.show', ['user' => $friend->friend->id]) }}" class="text-decoration-none">
                                <h5 class="text-sm font-medium text-gray-900">{{ $friend->friend->name }} {{ $friend->friend->lastname }}</h5>
                                <p class="text-xs text-gray-500">&#64;{{ $friend->friend->username }}</p>
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
                <p class="text-gray-100">You don't have any friends for now! Add some!</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>