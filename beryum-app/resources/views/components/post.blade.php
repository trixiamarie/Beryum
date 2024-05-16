<style>
    .dropdown-toggle::after {
        content: none;

    }

    .logFirst:hover {
        background-color: #312E81;
        color: #312E81;
        pointer-events: none;

    }

    .logFirst:hover::after {
        content: "Login or Register first!";
        color: white;
    }
</style>
@if(auth()->check())
<!--Modale Edit-->
<div class="modal fade" id="exampleModal{{ $posts->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bgtrans overflow-hidden sm:rounded-lg">
                        <div class=" bgtrans border-b border-gray-200">
                            <form action="{{ route('post.update', ['post' => $posts->id]) }}" method="POST" class="space-y-6">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label for="content" class="block text-sm font-medium text-gray-700">Post Content</label>
                                    <textarea id="content" name="content" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="What's on your mind?" required>{{$posts->content}}</textarea>
                                </div>

                                <div>
                                    <label for="recipe_id" class="block text-sm font-medium text-gray-700">Recipe (Optional)</label>
                                    <select id="recipe_id" name="recipe_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Select a Recipe</option>
                                        @foreach (auth()->user()->recipes as $recipe)
                                        <option value="{{ $recipe->id }}" {{ $posts->recipe_id == $recipe->id ? 'selected' : '' }}>{{ $recipe->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL (Optional)</label>
                                    <input type="url" id="image_url" name="image_url" value="{{ $posts->image_url }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modale Destroy Post-->
<div class="modal fade" id="destroy{{ $posts->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this post? Once deleted, there's no way to get it back!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('post.destroy', ['post' => $posts->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>

            </div>
        </div>
    </div>
</div>

<!--Modale Repost-->
@include('components.repostmodal')
@else
@endif
<div class="bgtrans p-3 mb-2 card border-0 shadow-sm rounded-lg">
    <div class="flex items-center justify-content-between">

        <div class="flex items-center">
            <a href="{{route('user.show', ['user' => $posts->user->id])}}">
                <img src="{{asset($posts->user->avatar) }}" alt="user" class="rounded-full h-12 w-12 object-cover mr-4 border border-white border-2">
            </a>
            <div>
                <a href="{{route('user.show', ['user' => $posts->user->id])}}">
                    <p class="font-semibold text-white">{{ $posts->user->name }} {{ $posts->user->lastname }}</p>
                </a>
                <a href="{{route('user.show', ['user' => $posts->user->id])}}">
                    <p class="text-gray-200 text-sm">&#64;{{ $posts->user->username }}</p>
                    <p class="text-gray-200 text-sm">{{ $posts->created_at->format('M d, Y')  }}</p>
                </a>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                </svg>
            </button>
            <ul class="dropdown-menu">
                @if($posts->user_id == Auth::id())
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#destroy{{ $posts->id }}">Delete Post</a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $posts->id }}">Edit Post</a></li>
                @else
                <li><a class="dropdown-item" href="#">Report Post</a></li>
                @endif
            </ul>
        </div>
    </div>
    <p class="my-2 text-white">{{ $posts->content }}</p>


    @if($posts->parentPost)
    <a href="{{route('post.show', [$posts->parentPost->id])}}">
        @include('components.postparent')
    </a>
    @endif

    @if(is_null($posts->image_url))
    @else
    <img src="{{ $posts->image_url }}" alt="Post Image" class="w-50 my-3 rounded-lg align-items-center">
    @endif

    @if(is_null($posts->recipe_id))
    @else
    <!--Recipe-->
   
        <div class="bgtrans2 card mb-3 border border-0 rounded-lg shadow-sm" style="max-width: 540px;">
        <a href="{{route('recipe.show', ['recipe' => $posts->recipe->id])}}">
            <div class="row g-0">
            
                <div class="col-md-4">
                    <img src="{{ $posts->recipe->image_url }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-white">{{ $posts->recipe->title }}</h5>
                        <p class="text-gray-100">By: {{ $posts->recipe->user->name }} {{ $posts->recipe->user->lastname }} (&#64;{{ $posts->recipe->user->username }})</p>
                    </div>
                </div>
                
            </div>
            </a>
        </div>
  
    @endif
    <!-- Bottoni Post -->
    @if(auth()->check())
    <div class="flex justify-between mt-3 px-4 border-t border-white py-3">

        <!-- if senza like, if con like -->
        @php
        $userLikedPost = $posts->likes->contains('user_id', auth()->id());
        @endphp

        @if(!$userLikedPost)
        <!-- Form per mettere like -->
        <form action="{{ route('postlike.store') }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $posts->id }}">
            <button type="submit" class="flex items-center text-white text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart me-2" viewBox="0 0 16 16">
                    <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
                </svg>
                Like

            </button>
        </form>
        @else
        <!-- Form per rimuovere like -->
        <form action="{{ route('postlike.destroy', $posts->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="flex items-center text-red-600 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart-fill me-2" viewBox="0 0 16 16">
                    <path d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1" />
                </svg>
                Unlike

            </button>
        </form>
        @endif

        <!-- Bottone che funge da trigger per il collapse del form -->
        <button class="flex items-center text-white text-sm" type="button" data-bs-toggle="collapse" data-bs-target="#commentForm{{$posts->user->id}}" aria-expanded="false" aria-controls="commentForm{{$posts->user->id}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots-fill me-2" viewBox="0 0 16 16">
                <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
            </svg>
            Comment
        </button>
        @if($posts->user_id == Auth::id())
        @else
        <button class="flex items-center text-white text-sm" data-bs-toggle="modal" data-bs-target="#writePostModal" data-post-id="{{ $posts->id }}" data-post-content="{{ $posts->content }}" data-post-recipe-id="{{ $posts->recipe_id ?? '' }}" data-post-name="{{ $posts->user->name }}" data-post-lastname="{{ $posts->user->lastname }}" data-post-username="{{ $posts->username }}" data-post-image="{{ $posts->image_url }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
            </svg>
            Repost
        </button>
        @endif
        <button class="flex items-center text-white text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill me-2" viewBox="0 0 16 16">
                <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5" />
            </svg>
            Share
        </button>
        <button class="flex items-center text-white text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save me-2" viewBox="0 0 16 16">
                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
            </svg>
            Save
        </button>
    </div>
    @else
    <div class="logFirst flex text-gray-100 hover:text-indigo-900 justify-between py-2 mt-3 px-4 rounded-lg">
        <button type="submit" class="flex items-center text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-suit-heart me-2" viewBox="0 0 16 16">
                <path d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.6 7.6 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z" />
            </svg>
            Like

        </button>


        <!-- Bottone che funge da trigger per il collapse del form -->
        <button class="flex items-center text-sm" type="button" data-bs-toggle="collapse" data-bs-target="#commentForm{{$posts->user->id}}" aria-expanded="false" aria-controls="commentForm{{$posts->user->id}}" disabled>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-dots-fill me-2" viewBox="0 0 16 16">
                <path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353zM5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
            </svg>
            Comment
        </button>

        <button class="flex items-center text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9" />
                <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z" />
            </svg>
            Repost
        </button>
        <button class="flex items-center text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill me-2" viewBox="0 0 16 16">
                <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5" />
            </svg>
            Share
        </button>
        <button class="flex items-center text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-save me-2" viewBox="0 0 16 16">
                <path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1z" />
            </svg>
            Save
        </button>
    </div>
    @endif

    <!-- Comment Section -->
    <div class="">
        @forelse ($posts->comments as $comment)
        @include('components.comment', ['comment' => $comment])
        @empty
        <p class="text-white">No comments yet.</p>
        @endforelse
    </div>



    <!-- Form che diventa visibile quando il bottone viene cliccato -->
    <form action="{{ route('postcomment.store') }}" method="POST" class="m-4 collapse" id="commentForm{{$posts->user->id}}" style="visibility: visible;">
        @csrf
        <input type="hidden" name="post_id" value="{{$posts->id}}">
        <div class="mt-2">
            <textarea name="comment" rows="3" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-700" placeholder="Leave a comment..."></textarea>
        </div>
        <div class="flex justify-end mt-2">
            <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded hover:bg-orange-700 focus:outline-none focus:bg-orange-800">
                Post Comment
            </button>
        </div>
    </form>

</div>

<script>
    $(document).ready(function() {
        $('#writePostModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Bottone che ha attivato la modale

            var modal = $(this);
            modal.find('#parentPostContent').text(button.data('post-content'));
            modal.find('#parentPostName').text(button.data('post-name') + ' ' + button.data('post-lastname'));
            modal.find('#parentPostUsername').text('@' + button.data('post-username'));
            modal.find('#parentPostDate').text(button.data('post-date'));

            // Gestione dell'immagine
            var imageUrl = button.data('post-image');
            if (imageUrl) {
                modal.find('#parentPostImage').attr('src', imageUrl);
                modal.find('#parentPostImageContainer').show();
            } else {
                modal.find('#parentPostImageContainer').hide();
            }

            modal.find('#parentPostAvatar').attr('src', button.data('post-avatar') || 'default-avatar-path.jpg'); // Gestisci il percorso di un'immagine di default
        });
    });
</script>