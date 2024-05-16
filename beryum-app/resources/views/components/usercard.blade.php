<div class="mt-2">
    <div class="flex items-center justify-content-between space-x-3 p-3">
        <div class="d-flex align-items-center">
        <a href="{{ route('user.show', ['user' => $user->id]) }}">
            <img src="{{ asset($user->avatar) }}" alt="Profile picture of {{ $user->name }}" class="w-12 h-12 rounded-full border-2 border-white shadow-sm me-3">
        </a>
        <a href="{{ route('user.show', ['user' => $user->id]) }}" class="text-decoration-none">
                <h5 class="text-sm font-medium text-white">{{ $user->name }} {{ $user->lastname }}</h5>
                <p class="text-xs text-gray-100">&#64;{{ $user->username }}</p>
            </a>
        </div>
        <div class="d-flex ">
            
            <button class="mt-1 rounded-full py-1 px-3 bg-orange-700 text-white text-xs flex items-center hover:bg-orange-600 focus:outline-none focus:bg-orange-800 transition-colors">
                View Profile
            </button>
        </div>
    </div>
</div>
