<div class="mb-2 p-4 bg-white rounded-lg shadow-md overflow-hidden">
    <div class="md:flex justify-content-between">
        <!-- Further reduced avatar container -->
        <div class="flex">
        <div class="md:flex-shrink-0 md:w-16">
            <img class="h-16 w-full object-cover" src="{{ optional($request->fromUser)->avatar }}" alt="Profile picture">
        </div>
        <div class="px-3 flex">
            <div>
                <!-- Name and link styling -->
                <a href="#" class="block mt-1 text-lg leading-tight font-medium text-white hover:underline">
                    {{ optional($request->fromUser)->name }} {{ optional($request->fromUser)->lastname }}
                </a>
                <a>&#64;{{ optional($request->fromUser)->username }}</a>
                <!-- City information -->
                <div class="flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill text-gray-500" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                    </svg>
                    <p class="text-gray-500">{{ optional($request->fromUser)->city }}</p>
                </div>
            </div>
        </div>
        </div>
        <div class="mt-4 flex">
                <!-- Accept button -->
                <form action="{{ route('friendrequest.update', ['friendrequest'=>$request->id, 'friend_id'=>$request->fromUser->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="px-3 py-1 text-sm text-white  bg-green-500 hover:bg-indigo-500 rounded-2xl">Accept</button>
                </form>
                <!-- Reject button -->
                <form action="{{ route('friendrequest.destroy', $request->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="px-3 py-1 text-sm text-white bg-red-500 hover:bg-indigo-500 rounded-2xl mx-3">Reject</button>
                </form>
            </div>
    </div>
</div>