<div class="p-3 mb-2 bg-orange-700 shadow-md rounded-lg">
                        <div class="flex items-center">
                            <a href="#">

                                <img src="{{asset($user->avatar)}}" alt="user" class="w-12 h-12 rounded-full object-cover mr-2 border border-white border-2">

                            </a>
                            <div class="flex-grow">
                                <button class="bg-gray-100 hover:bg-white rounded-full text-left w-full text-gray-500 font-medium py-3 px-4" style="font-size: 0.875rem;" data-bs-toggle="modal" data-bs-target="#writePostModal">
                                    What's on your mind?
                                </button>
                            </div>
                        </div>
                        <div class="hidden lg:flex mt-3 items-center">
                            <div class="flex-1 flex text-white justify-center p-2 rounded-lg hover:bg-orange-600 hover:text-white" data-bs-toggle="modal" data-bs-target="#newRecipeModal">
                                
                                    New Recipe?
                                
                            </div>
                            <div class="flex-1 flex text-white justify-center p-2 rounded-lg hover:bg-orange-600 hover:text-white"  data-bs-toggle="modal" data-bs-target="#writePostModal">
                               
                                    Write Post
                                
                            </div>
                        </div>
                    </div>