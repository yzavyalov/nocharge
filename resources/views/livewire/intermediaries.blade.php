<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
    <div class="flex justify-between items-center mb-4">
        <form action="{{ route('search-review') }}" method="get" class="flex items-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mr-2 flex-grow">
                <input type="text" id="searchIntermediary" name="search" class="mt-1 p-2 border border-gray-300 rounded-md lg:w-96" placeholder="Enter search criteria">
                <select id="intermediaryCategory" name="category" class="mt-1 p-2 border border-gray-300 rounded-md w-80" required>
                    @foreach($middlemanTypes as $value => $description)
                        <option value="{{ $value }}">{{ $description }}</option>
                    @endforeach
                </select>
            </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="searchIntermediary()" type="submit">
                Search
            </button>
        </form>
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="toggleForm('addIntermediaryForm')">
            Add bad intermediaries
        </button>
    </div>


    <form id="addIntermediaryForm" method="post" action="{{ route('save-review') }}" style="display:none;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div>
            <label for="intermediaryName" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="intermediaryName" name="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter name" required>
        </div>
        <div>
            <label for="intermediaryName" class="block text-sm font-medium text-gray-700">Link</label>
            <input type="text" id="intermediaryName" name="link" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter name">
        </div>

        <div class="mt-4">
            <label for="intermediaryCategory" class="block text-sm font-medium text-gray-700">Category</label>
            <select id="intermediaryCategory" name="category" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @foreach($middlemanTypes as $value => $description)
                    <option value="{{ $value }}">{{ $description }}</option>
                @endforeach
            </select>
        </div>

        <div class="mt-4">
            <label for="intermediaryReview" class="block text-sm font-medium text-gray-700">Review</label>
            <textarea id="intermediaryReview" name="text" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter review" required></textarea>
        </div>
        <div class="flex items-center justify-between mt-4">
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Save
            </button>
        </div>
    </form>
    <div class="row mt-2">
        <div class="col">
            <div class="w-full overflow-x-auto">
                <table class="w-full border-collapse border">
                    <thead>
                    <tr>
                        <th class="p-3 bg-gray-200 border">Category</th>
                        <th class="p-3 bg-gray-200 border">Name</th>
                        <th class="p-3 bg-gray-200 border">Link</th>
                        <th class="p-3 bg-gray-200 border">Reviews</th>
                        <th class="p-3 bg-gray-200 border"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reviews as $review)
                        <tr>
                            <td class="p-3 border">{{  \App\Enums\MiddlemanTypeEnum::toSelectArray()[$review->category] }}</td>
                            <td class="p-3 border"><a href="{{ route('show-review',$review->id) }}">{{ $review->name }}</a></td>
                            <td class="p-3 border"><a href="{{ $review->link }}">{{ $review->link }}</a></td>
                            <td class="p-3 border">{{ $review->text }}</td>
                            <td class="p-3 border text-center">
                                <button class="w-full px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700 focus:outline-none focus:shadow-outline-green active:bg-green-800 transition duration-150 ease-in-out" onclick="window.location.href='{{ route('show-review',$review->id) }}'">ADD COMMENT ({{ $review->comments->count() }})</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    function toggleForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('#intermediaryRating label');
        const gradeInput = document.getElementById('grade');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                gradeInput.value = index + 1;
                highlightStars(index);
            });
        });

        function highlightStars(index) {
            stars.forEach((star, i) => {
                star.style.color = i <= index ? 'gold' : 'gray';
            });
        }
    });
</script>
