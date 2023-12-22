<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
    <div class="flex justify-between mb-4">
        <div>
            <label for="searchIntermediary" class="block text-sm font-medium text-gray-700">Search Intermediary</label>
            <input type="text" id="searchIntermediary" class="mt-1 p-2 border border-gray-300 rounded-md w-full lg:w-96" placeholder="Enter search criteria">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="searchIntermediary()">
                Search
            </button>
        </div>
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="toggleForm('addIntermediaryForm')">
            Add bad intermediaries
        </button>
    </div>

    <form id="addIntermediaryForm" method="post" action="{{ route('save-intermediary') }}" style="display:none;">
        @csrf
            <div>
                <label for="intermediaryName" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="intermediaryName" name="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter name" required>
            </div>

            <div class="mt-4">
                <label for="intermediaryCategory" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="intermediaryCategory" name="type" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    @foreach($middlemanTypes as $value => $description)
                        <option value="{{ $value }}">{{ $description }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-4">
                <label for="intermediaryReview" class="block text-sm font-medium text-gray-700">Review</label>
                <textarea id="intermediaryReview" name="review" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter review" required></textarea>
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Save
                </button>
            </div>
        <!-- Форма для добавления посредника -->
        <!-- ... -->
    </form>

    <div id="searchResult" style="display:none;">
        <!-- Элемент с информацией о посреднике и отзывах -->
        <!-- ... -->
    </div>
</div>


<script>
    function toggleForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }

    function searchIntermediary() {
        var searchInput = document.getElementById('searchIntermediary');
        var searchTerm = searchInput.value.trim();

        // Здесь вы можете выполнить AJAX-запрос для поиска по названию и отобразить результат в #searchResult
        // Пример: document.getElementById('searchResult').innerHTML = 'Результаты поиска...';
        // Обратите внимание, что это просто заглушка, и вам нужно настроить логику поиска и отображения результатов.
    }
</script>
