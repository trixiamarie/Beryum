<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent overflow-hidden sm:rounded-lg">

                <div class="mb-2 p-2 bgtrans2 sm:rounded-lg">
                    <p class="text-lg text-white">
                        Search results for: {{ $search }}
                    </p>
                </div>

                @if($userresults->count()>0)
                <ul>
                    @foreach($userresults as $user)
                    <li class="bg-orange-500 mb-2 card border-0 shadow-sm rounded-lg">
                        @include('components.usercard')
                    </li>
                    @endforeach
                </ul>
                @else
                <div class="bg-orange-100 p-3 mb-2 card border-0 shadow-sm rounded-lg">
                    <p class="p-3 text-orange-950">No users found</p>
                </div>
                @endif

                @if($postresults->count()>0)
                @foreach($postresults as $posts)
                @include('components.post')
                @endforeach
                @else
                <div class="bg-orange-100 p-3 mb-2 card border-0 shadow-sm rounded-lg">
                    <p class="p-3 text-orange-950">No posts found</p>
                </div>
                @endif


                @if($reciperesults->count()>0)
                @foreach($reciperesults as $recipe)
                @include('components.recipe')
                @endforeach
                @else
                <div class="bg-orange-100 p-3 mb-2 card border-0 shadow-sm rounded-lg">
                    <p class="p-3 text-orange-950">No recipes found</p>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>