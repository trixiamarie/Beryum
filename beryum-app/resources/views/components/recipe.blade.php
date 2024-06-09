<a href="{{route('recipe.show', ['recipe' => $recipe->id])}}"><div class="bg-white shadow-lg rounded-lg overflow-hidden mb-3">
    <img src="{{ asset($recipe->image_url) }}" alt="Immagine della ricetta" class="object-cover object-center">
    
    <div class="p-4">
        <h3 class="text-lg font-bold">{{ $recipe->title }}</h3>
        <p class="text-gray-700 mt-2">{{ $recipe->description }}</p>
        <div class="mt-4">
            <span class="text-sm font-semibold">Preparazione:</span>
            <p class="text-sm text-gray-600">{{ $recipe->instructions }}</p>
        </div>
    </div>
</a>
    <div class="p-4 border-t border-gray-200">
        <a href="{{route('user.show', ['user'=>$recipe->user->id])}}">
        <div class="flex items-center">
            <img src="{{ $recipe->user->avatar }}" alt="Avatar" class="h-10 w-10 rounded-full">
            <div class="ml-3">
                <p class="text-sm font-semibold">{{ $recipe->user->name }} {{ $recipe->user->lastname }}</p>
                <p class="text-xs text-gray-600">{{ $recipe->user->email }}</p>
            </div>
        </div>
    </a>
    </div>
</div>
