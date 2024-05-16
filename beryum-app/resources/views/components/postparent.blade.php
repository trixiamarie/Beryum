<a href="{{route('post.show', ['post' => $post->parentPost->id])}}">
    <div class="bg-white p-4 shadow-sm rounded-lg mb-5">
        <div class="flex items-center space-x-4">
            <img src="{{ $post->parentPost->user->avatar }}" alt="Avatar" class="w-12 h-12 rounded-full">
            <div>
                <h4 class="font-bold text-lg">{{ $post->parentPost->user->name }}</h4>
                <p class="text-indigo-900 text-sm">&#64;{{ $posts->parentPost->user->username }}</p>
                <p class="text-sm text-gray-600">{{ $post->parentPost->created_at->format('M d, Y') }}</p>
            </div>
        </div>
        <div class="mt-3">
            <p>{{ $post->parentPost->content }}</p>
        </div>
        @if($post->parentPost->image_url)
        <div class="mt-3">
            <img src="{{ $post->parentPost->image_url }}" alt="Post Image" class="img-fluid">
        </div>
        @endif
    </div>
</a>