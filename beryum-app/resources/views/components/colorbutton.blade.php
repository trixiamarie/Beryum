<button id="openColorPicker" class="p-2 bg-orange-500 text-white rounded">Choose Color</button>

<!-- Color picker panel -->
<div id="colorPickerPanel" class="fixed left-0 top-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300">
    <button id="closeColorPicker" class="absolute top-2 right-2 p-1 bg-red-500 text-white rounded">Close</button>
    <h2 class="text-xl font-bold p-4">Select a Color</h2>
    <ul class="p-4">
        <li class="color-option p-2 hover:bg-gray-200 cursor-pointer" data-color="Orange">Orange</li>
        <li class="color-option p-2 hover:bg-gray-200 cursor-pointer" data-color="Rose">Rose</li>
        <li class="color-option p-2 hover:bg-gray-200 cursor-pointer" data-color="Slate">Slate</li>
        <li class="color-option p-2 hover:bg-gray-200 cursor-pointer" data-color="Cyan">Cyan</li>
    </ul>
</div>

<script>
    document.getElementById('openColorPicker').addEventListener('click', function() {
        document.getElementById('colorPickerPanel').classList.remove('-translate-x-full');
    });

    document.getElementById('closeColorPicker').addEventListener('click', function() {
        document.getElementById('colorPickerPanel').classList.add('-translate-x-full');
    });

    document.querySelectorAll('.color-option').forEach(function(element) {
        element.addEventListener('click', function() {
            const color = element.getAttribute('data-color');
            localStorage.setItem('selectedColor', color);
            alert('Selected color: ' + color);
            document.getElementById('colorPickerPanel').classList.add('-translate-x-full');
        });
    });
</script>