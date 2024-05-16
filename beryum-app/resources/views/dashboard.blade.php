<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>
    @if(auth()->check())
    <!-- Modal for New Recipe -->
    @include('components.newrecipemodal')

    <!-- Modal for Write Post -->
    
    @include('components.newpostmodal')
    

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent overflow-hidden sm:rounded-lg">
                
                <div class="p-6 text-gray-900">
                    @include('components.newpost')
                    @endif
                    <div id="posts-container">
                    @foreach ($posts as $post)
                    @include('components.post', ['posts' => $post])
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>



