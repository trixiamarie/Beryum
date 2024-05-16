<!-- component -->
<div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-1/4 bg-transparent rounded-lg">
          <!-- Sidebar Header -->
          <!-- <header class="p-4 flex justify-between items-center bg-transparent text-white rounded-lg">
            <h1 class="text-2xl font-semibold hidden">Chat Web</h1>
            <div class="relative hidden">
              <button id="menuButton" class="focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                  <path d="M2 10a2 2 0 012-2h12a2 2 0 012 2 2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                </svg>
              </button> -->
              <!-- Menu Dropdown -->
              <!-- <div id="menuDropdown" class="absolute right-0 mt-2 w-48 bgtrans rounded-md shadow-lg hidden">
                <ul class="py-2 px-3">
                  <li><a href="#" class="block px-4 py-2 text-gray-800 hover:text-gray-400">Option 1</a></li>
                  <li><a href="#" class="block px-4 py-2 text-gray-800 hover:text-gray-400">Option 2</a></li> -->
                  <!-- Add more menu options here -->
                <!-- </ul>
              </div>
            </div>
          </header> -->
        
          <!-- Contact List -->
          <div class="overflow-y-auto h-screen p-3 mb-9 pb-20 rounded-lg" style="margin-top:4rem;">
            <div class="flex items-center mb-4 cursor-pointer bgtrans hover:bg-gray-100 p-2 rounded-lg">
              <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-12 h-12 rounded-full">
              </div>
              <div class="flex-1">
                <h2 class="text-lg font-semibold text-white">Admin Admin</h2>
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
              </div>
            </div>
            
            <div class="flex items-center mb-4 cursor-pointer bgtrans hover:bg-gray-100 p-2 rounded-lg">
              <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-12 h-12 rounded-full">
              </div>
              <div class="flex-1">
                <h2 class="text-lg font-semibold text-white">Hannah Robertson</h2>
                <p class="text-white">Lorem ipsum dolor sit amet</p>
              </div>
            </div>
            
            <div class="flex items-center mb-4 cursor-pointer bgtrans hover:bg-gray-100 p-2 rounded-lg">
              <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-12 h-12 rounded-full">
              </div>
              <div class="flex-1">
                <h2 class="text-lg font-semibold text-white">Ian Lovercraft</h2>
                <p class="text-white">Lorem ipsum dolor</p>
              </div>
            </div>
            
            
          </div>
        </div>
        
        <!-- Main Chat Area -->
        <div class="flex-1">
            <!-- Chat Header -->
            <header class="bgtrans shadow-sm rounded-lg p-3 text-black" style="margin-top:1.4rem;margin-bottom: 0.2rem;">
                <h1 class="text-2xl font-semibold text-white">Alice</h1>
            </header>
            
            <!-- Chat Messages -->
            <div class="overflow-y-auto p-4 pb-36" style="height: 80vh;">
               <!-- Incoming Message -->
               <div class="flex mb-4 cursor-pointer">
                 <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-8 h-8 rounded-full">
                 </div>
                 <div class="flex max-w-96 bgtrans rounded-lg p-3 gap-3">
                   <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                 </div>
               </div>
               
               <!-- Outgoing Message -->
               <div class="flex justify-end mb-4 cursor-pointer">
                 <div class="flex max-w-96 bg-orange-700 text-white rounded-lg p-3 gap-3">
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                 </div>
                 <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="My Avatar" class="w-8 h-8 rounded-full">
                 </div>
               </div>
               
               <!-- Incoming Message -->
               <div class="flex mb-4 cursor-pointer">
                 <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-8 h-8 rounded-full">
                 </div>
                 <div class="flex max-w-96 bgtrans rounded-lg p-3 gap-3">
                   <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                 </div>
               </div>
               
               <!-- Outgoing Message -->
               <div class="flex justify-end mb-4 cursor-pointer">
                 <div class="flex max-w-96 bg-orange-700 text-white rounded-lg p-3 gap-3">
                   <p>Message Test</p>
                 </div>
                 <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="My Avatar" class="w-8 h-8 rounded-full">
                 </div>
               </div>
               
               <!-- Incoming Message -->
               <div class="flex mb-4 cursor-pointer">
                 <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-8 h-8 rounded-full">
                 </div>
                 <div class="flex max-w-96 bgtrans rounded-lg p-3 gap-3">
                   <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                 </div>
               </div>
               
               <!-- Outgoing Message -->
               <div class="flex justify-end mb-4 cursor-pointer">
                 <div class="flex max-w-96 bg-orange-700 text-white rounded-lg p-3 gap-3">
                   <p>Lorem ipsum dolor sit amet</p>
                 </div>
                 <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="My Avatar" class="w-8 h-8 rounded-full">
                 </div>
               </div>
               
               <!-- Incoming Message -->
               <div class="flex mb-4 cursor-pointer">
                 <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-8 h-8 rounded-full">
                 </div>
                 <div class="flex max-w-96 bgtrans rounded-lg p-3 gap-3">
                   <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                 </div>
               </div>
               
               <!-- Outgoing Message -->
               <div class="flex justify-end mb-4 cursor-pointer">
                 <div class="flex max-w-96 bg-orange-700 text-white rounded-lg p-3 gap-3">
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                 </div>
                 <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="My Avatar" class="w-8 h-8 rounded-full">
                 </div>
               </div>
               
               <!-- Incoming Message -->
               <div class="flex mb-4 cursor-pointer">
                 <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-8 h-8 rounded-full">
                 </div>
                 <div class="flex max-w-96 bgtrans rounded-lg p-3 gap-3">
                   <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                 </div>
               </div>
               
               <!-- Outgoing Message -->
               <div class="flex justify-end mb-4 cursor-pointer">
                 <div class="flex max-w-96 bg-orange-700 text-white rounded-lg p-3 gap-3">
                   <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                 </div>
                 <div class="w-9 h-9 rounded-full flex items-center justify-center ml-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="My Avatar" class="w-8 h-8 rounded-full">
                 </div>
               </div>
               <!-- Incoming Message -->
               <div class="flex mb-4 cursor-pointer">
                 <div class="w-9 h-9 rounded-full flex items-center justify-center mr-2">
                   <img src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_1280.png" alt="User Avatar" class="w-8 h-8 rounded-full">
                 </div>
                 <div class="flex max-w-96 bgtrans rounded-lg p-3 gap-3">
                   <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit,</p>
                 </div>
               </div>
               
            </div>
            
            <!-- Chat Input -->
            <div class="bg-transparent border-t border-gray-300 p-4 absolute bottom-0" style="width: 38%;">
                <div class="flex items-center">
                    <input type="text" placeholder="Type a message..." class="w-full p-2 rounded-md bgtrans border border-gray-400 focus:outline-none focus:border-orange-500 placeholder-white text-white">
                    <button class="bg-orange-700 text-white px-4 py-2 rounded-md ml-2">Send</button>
                </div>
</div>
        </div>
    </div>
    <script>
      // JavaScript for showing/hiding the menu
      const menuButton = document.getElementById('menuButton');
      const menuDropdown = document.getElementById('menuDropdown');
      
      menuButton.addEventListener('click', () => {
        if (menuDropdown.classList.contains('hidden')) {
          menuDropdown.classList.remove('hidden');
        } else {
          menuDropdown.classList.add('hidden');
        }
      });
      
      // Close the menu if you click outside of it
      document.addEventListener('click', (e) => {
        if (!menuDropdown.contains(e.target) && !menuButton.contains(e.target)) {
          menuDropdown.classList.add('hidden');
        }
      });
    </script>