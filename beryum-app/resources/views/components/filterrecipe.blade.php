<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-3">
    <form method="GET" action="{{ route('recipe.index') }}" class="space-y-4">
        <div class="flex flex-wrap -mx-2 space-y-4 md:space-y-0">
            <div class="px-2 w-full md:w-1/4">
                <label for="type" class="block text-sm font-medium text-white">Recipe Type</label>
                <select id="type" name="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select</option>
                    <option value="dolce">Sweet</option>
                    <option value="salato">Salty</option>
                    <option value="salato">Vegetarian</option>
                    <option value="salato">Vegan</option>
                </select>
            </div>
            <div class="px-2 w-full md:w-1/4">
                <label for="region" class="block text-sm font-medium text-white">From</label>
                <input type="text" id="region" name="region" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Ex. Italy">
            </div>
            <div class="px-2 w-full md:w-1/4">
                <label for="title" class="block text-sm font-medium text-white">Title</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="What is the dish called?">
            </div>
            <div class="px-2 w-full md:w-1/4">
                <label for="user" class="block text-sm font-medium text-white">User</label>
                <input type="text" id="user" name="user" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="User">
            </div>
            <div class="px-2 w-full md:w-1/4">
                <label for="ingredients" class="block text-sm font-medium text-white">Ingredients</label>
                <input type="text" id="ingredients" name="ingredients" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Es. Pomodori, Sale">
            </div>
            <div class="px-2 w-full">
            <button type="submit" class="float-right bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md">
                Search
            </button>
        </div>
        </div>
    </form>
</div>
