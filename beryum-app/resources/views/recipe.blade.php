<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-12 overflow-hidden bgtrans text-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 ease-in-out">
            <img src="{{ asset($recipe->image_url) }}" alt="Image of {{ $recipe->title }}" class="w-full object-cover">

            <div class="p-4">
                <h2 class="text-2xl font-bold text-orange-900">{{ $recipe->title }}</h2>
                <p class="text-sm text-white">By {{ $recipe->user->name }} {{ $recipe->user->lastname }}</p>

                <div class="mt-2">
                    <h3 class="text-lg font-semibold text-orange-800">Ingredients:</h3>
                    <div class="grid grid-cols-2 gap-x-4">
                        <div>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($recipe->ingredients->take($recipe->ingredients->count() / 2) as $ingredient)
                                <li>{{ $ingredient->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div>
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($recipe->ingredients->skip($recipe->ingredients->count() / 2) as $ingredient)
                                <li>{{ $ingredient->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold text-orange-800">Instructions:</h3>
                    <p class="text-sm text-white whitespace-pre-line">{{ $recipe->instructions }}</p>
                </div>
            </div>

            <div class="my-4 mx-4 flex text-white justify-between items-center border-t border-white pt-3 px-3">
                <button class="d-flex  transition-colors duration-300 ease-in-out">
                    <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                    </svg>
                    Like
                </button>

                <button class=" transition-colors duration-300 ease-in-out">
                    Comment
                </button>

                <button class=" transition-colors duration-300 ease-in-out">
                    Share
                </button>

                <button class=" transition-colors duration-300 ease-in-out">
                    Save
                </button>
            </div>

            <form action="#" method="POST" class="m-4">
                @csrf
                <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                <div class="mt-2">
                    <textarea name="comment" rows="3" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Leave a comment..."></textarea>
                </div>
                <div class="flex justify-end mt-2">
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">
                        Post Comment
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>