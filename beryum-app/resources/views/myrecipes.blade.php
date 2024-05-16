<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('components.filterrecipe')
            @if(empty($recipes) || $recipes->isEmpty())
            <p>You don't have any recipes yet.</p>
            @else
            @foreach($recipes as $recipe)
            @include('components.recipe')
            @endforeach
            @endif
        </div>
    </div>
</x-app-layout>