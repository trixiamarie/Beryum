<div class="modal fade" id="newRecipeModal" tabindex="-1" aria-labelledby="newRecipeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRecipeModalLabel">New Recipe</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form or information here -->
                    <div class="max-w-7xl mx-auto">
                        <div class="bg-white overflow-hidden sm:rounded-lg">
                            <div class="bg-white border-b border-gray-200">
                                <form action="{{ route('recipe.store') }}" method="POST" class="space-y-8 divide-y divide-gray-200">
                                    @csrf
                                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                            <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Title
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input type="text" name="title" id="title" required class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Description
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <textarea name="description" id="description" rows="3" required class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="instructions" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Instructions
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <textarea name="instructions" id="instructions" rows="3" required class="max-w-lg shadow-sm block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="image_url" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                                Image URL (optional)
                                            </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input type="url" name="image_url" id="image_url" class="max-w-lg block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save Recipe
                    </button>
                </div>
            </div>
        </div>
    </div>