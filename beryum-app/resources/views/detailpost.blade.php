<x-app-layout>
@section('title', 'Post - Beryum')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-3 my-6 sm:px-6 lg:px-8">
    @include('components.post')
    </div>
</x-app-layout>