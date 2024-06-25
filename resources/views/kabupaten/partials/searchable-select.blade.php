<div class="container mx-auto">
    <div class="mb-4">
        <label for="your_select" class="block text-sm font-medium text-gray-700">Filter berdasarkan provinsi</label>
        <div class="relative">
            <input
                type="text"
                id="search-input"
                onfocus="toggleDropdown(true)"
                onblur="toggleDropdown(false)"
                oninput="filterOptions()"
                placeholder="Pilih provinsi"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <input type="hidden" name="select" id="selected-id">
            <div id="dropdown" class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg max-h-60" style="display: none;">
                <ul id="options-list">
                    @foreach($provinsi as $option)
                        <li onclick="selectOption({{ $option->id }}, '{{ $option->nama_provinsi }}')" class="px-3 py-2 cursor-pointer hover:bg-gray-100">{{ $option->nama_provinsi }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    {{-- reset button --}}
    <button onclick="resetTableData()" class="px-4 py-2 text-sm text-white bg-red-700 rounded-lg hover:bg-red-900">Reset Filter</button>

</div>

<script>
function toggleDropdown(open) {
    const dropdown = document.getElementById('dropdown');
    if (open) {
        dropdown.style.display = 'block';
        adjustDropdownHeight();
    } else {
        // Delay hiding the dropdown to allow click event on options
        setTimeout(() => {
            dropdown.style.display = 'none';
        }, 200);
    }
}

function adjustDropdownHeight() {
    const dropdown = document.getElementById('dropdown');
    const optionsList = document.getElementById('options-list');
    const numOfOptions = optionsList.children.length;
    const optionHeight = 40; // Adjust this based on your li height in CSS

    // Calculate the dropdown height
    const dropdownHeight = Math.min(numOfOptions * optionHeight, parseInt(window.innerHeight * 0.6));

    dropdown.style.maxHeight = `${dropdownHeight}px`;
}

function filterOptions() {
    const searchInput = document.getElementById('search-input').value.toLowerCase();
    const optionsList = document.getElementById('options-list');
    const options = optionsList.getElementsByTagName('li');

    for (let i = 0; i < options.length; i++) {
        const option = options[i];
        if (option.textContent.toLowerCase().includes(searchInput)) {
            option.style.display = 'block';
        } else {
            option.style.display = 'none';
        }
    }

    adjustDropdownHeight(); // Adjust dropdown height after filtering
}

function selectOption(id, name) {
    const searchInput = document.getElementById('search-input');
    const selectedId = document.getElementById('selected-id');

    searchInput.value = name;
    selectedId.value = id;

    toggleDropdown(false);

    // Call function to update table data based on selected provinsi_id
    updateTableData(id);
}

function updateTableData(provinsiId) {
    const rows = document.querySelectorAll('#kabupaten-table tbody tr');

    rows.forEach(row => {
        const provinsiIdCell = row.querySelector('.provinsi-id');

        if (provinsiIdCell.textContent.trim() === provinsiId.toString()) {
            row.classList.remove('hidden');
        } else {
            row.classList.add('hidden');
        }
    });
}

function resetTableData() {
    const rows = document.querySelectorAll('#kabupaten-table tbody tr');

    rows.forEach(row => {
        row.classList.remove('hidden');
    });

    document.getElementById('search-input').value = '';
    document.getElementById('selected-id').value = '';
}
</script>