<!--Modale Edit-->
<div class="modal fade" id="exampleModal{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Comment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class=" bg-white border-b border-gray-200">
                            <form action="{{ route('postcomment.update', ['postcomment' => $comment->id]) }}" method="POST" class="space-y-6">
                                @csrf
                                @method('PUT')

                                <div>
                                    <label for="content" class="block text-sm font-medium text-gray-700">Comment Content</label>
                                    <textarea id="content" name="content" rows="4" class="shadow-sm focus:ring-orange-500 focus:border-orange-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="What's on your mind?" required>{{$comment->comment}}</textarea>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
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
<div class="modal fade" id="destroy{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this comment? Once deleted, there's no way to get it back!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('postcomment.destroy', ['postcomment' => $comment->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Post</button>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="flex justify-between p-2 my-2 bgtrans2 text-white shadow-sm rounded-lg">

    <div class="flex" >
        <a href="{{route('user.show', ['user' => $comment->user->id])}}">
            <img src="{{ asset($comment->user->avatar) }}" alt="user" class="rounded-full h-8 w-8 object-cover mr-4 border border-white border-2">
        </a>
        <div>
        <div>
            <a class="hover:text-orange-200" href="{{route('user.show', ['user' => $comment->user->id])}}">
                <p class="font-semibold">{{ $comment->user->name }} {{ $comment->user->lastname }} <span class="text-gray-100 text-sm">(&#64;{{ $comment->user->username }})</span></p>
            </a>
        </div>
        <p class="my-2">{{ $comment->comment }}.</p>
    </div>
    </div>

    <div class="dropdown">
            <button class="dropdown-toggle text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                </svg>
            </button>
            <ul class="dropdown-menu">
                @if($comment->user_id == Auth::id())
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#destroy{{ $comment->id }}">Delete Comment</a></li>
                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $comment->id }}">Edit Comment</a></li>
                @else
                <li><a class="dropdown-item" href="#">Report Comment</a></li>
                @endif
            </ul>
        </div>
</div>