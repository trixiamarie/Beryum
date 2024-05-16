<div class="modal fade" id="writePostModal" tabindex="-1" aria-labelledby="writePostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="writePostModalLabel">Write Post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form or information here -->
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden sm:rounded-lg">
                            <div class=" bg-white border-b border-gray-200">
                                <form action="{{ route('post.store') }}" method="POST" class="space-y-6">
                                    @csrf
                                    <div>
                                        <label for="content" class="block text-sm font-medium text-gray-700">Post Content</label>
                                        <textarea id="content" name="content" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="What's on your mind?" required></textarea>
                                    </div>

                                    <div>
                                        <label for="recipe_id" class="block text-sm font-medium text-gray-700">Recipe (Optional)</label>
                                        <select id="recipe_id" name="recipe_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Select a Recipe</option>
                                            @foreach (auth()->user()->recipes as $recipe)
                                            <option value="{{ $recipe->id }}">{{ $recipe->title }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                        
                                    <div>
                                        <label for="image_url" class="block text-sm font-medium text-gray-700">Image URL (Optional)</label>
                                        <input type="url" id="image_url" name="image_url" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>

                                    <div class="flex justify-end">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Post
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