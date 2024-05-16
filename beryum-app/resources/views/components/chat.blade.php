<!-- component -->
<div class="fixed bottom-0 right-0 mb-4 mr-4" style="z-index: 1000;">
        <button id="open-chat" class="bg-orange-700 text-white py-2 px-4 rounded-md hover:bg-orange-600 shadow-md transition duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile-fill me-2" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M10 8c-.552 0-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5S10.552 8 10 8"/>
</svg>
        <!-- <img src="images/mamaeden.jpg" alt="user" class="rounded-full h-12 w-12 object-cover mr-4"> -->
            Chat with Mama Eden
        </button>
    </div>
    <div id="chat-container" class="hidden fixed bottom-16 right-4 w-96" style="z-index: 1000;">
        <div class="bg-white shadow-md rounded-lg max-w-lg w-full">
            <div class="p-4 border-b bg-orange-700 text-white rounded-t-lg flex justify-between items-center">
                <div class="flex align-items-center">
                     <!-- <img src="{{ asset('mamaeden.jpg') }}" alt="user" class="rounded-full h-12 w-12 object-cover mr-4"> -->
                <p class="text-lg font-semibold">Mama Eden</p>
                </div>
           
                <button id="close-chat" class="text-gray-300 hover:text-gray-400 focus:outline-none focus:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div id="chatbox" class="p-4 h-80 overflow-y-auto">
              <!-- Chat messages will be displayed here -->
              <div class="mb-2 text-right">
                <p class="bg-orange-700 text-white rounded-lg py-2 px-4 inline-block">hello</p>
              </div>
              <div class="mb-2">
                <p class="bg-orange-600 text-white rounded-lg py-2 px-4 inline-block">Hi, how can I help you?</p>
              </div>
              <div class="mb-2 text-right">
                <p class="bg-orange-700 text-white rounded-lg py-2 px-4 inline-block">I'm looking for a recipe</p>
              </div>
              <div class="mb-2">
                <p class="bg-orange-600 text-white rounded-lg py-2 px-4 inline-block">Sure! What kind of recipe are you looking for exactly?</p>
              </div>
              <div class="mb-2 text-right">
                <p class="bg-orange-700 text-white rounded-lg py-2 px-4 inline-block">I want something spicy</p>
              </div>
              <div class="mb-2">
                <p class="bg-orange-600 text-white rounded-lg py-2 px-4 inline-block">Check out these recipes!</p>
              </div>
            </div>
            <div class="p-4 border-t flex">
                <input id="user-input" type="text" placeholder="Type a message" class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                <button id="send-button" class="bg-orange-700 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">Send</button>
            </div>
        </div>
    </div>
    <script>
        const chatbox = document.getElementById("chatbox");
const chatContainer = document.getElementById("chat-container");
const userInput = document.getElementById("user-input");
const sendButton = document.getElementById("send-button");
const openChatButton = document.getElementById("open-chat");
const closeChatButton = document.getElementById("close-chat");

let isChatboxOpen = true; // Set the initial state to open

// Function to toggle the chatbox visibility
function toggleChatbox() {
    chatContainer.classList.toggle("hidden");
    isChatboxOpen = !isChatboxOpen; // Toggle the state
}

// Add an event listener to the open chat button
openChatButton.addEventListener("click", toggleChatbox);

// Add an event listener to the close chat button
closeChatButton.addEventListener("click", toggleChatbox);

// Add an event listener to the send button
sendButton.addEventListener("click", function () {
    const userMessage = userInput.value;
    if (userMessage.trim() !== "") {
        addUserMessage(userMessage);
        respondToUser(userMessage);
        userInput.value = "";
    }
});

userInput.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        const userMessage = userInput.value;
        addUserMessage(userMessage);
        respondToUser(userMessage);
        userInput.value = "";
    }
});

function addUserMessage(message) {
    const messageElement = document.createElement("div");
    messageElement.classList.add("mb-2", "text-right");
    messageElement.innerHTML = `<p class="bg-orange-700 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
    chatbox.appendChild(messageElement);
    chatbox.scrollTop = chatbox.scrollHeight;
}

function addBotMessage(message) {
    const messageElement = document.createElement("div");
    messageElement.classList.add("mb-2");
    messageElement.innerHTML = `<p class="bg-orange-600 text-white rounded-lg py-2 px-4 inline-block">${message}</p>`;
    chatbox.appendChild(messageElement);
    chatbox.scrollTop = chatbox.scrollHeight;
}

function respondToUser(userMessage) {
    // Replace this with your chatbot logic
    setTimeout(() => {
        addBotMessage("This is a response from the chatbot.");
    }, 500);
}

// Automatically open the chatbox on page load
//toggleChatbox();

        </script>