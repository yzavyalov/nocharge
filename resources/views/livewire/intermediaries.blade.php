<div class="container mt-4">
    <div class="card bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 mt-4" style="border: 5px solid #FF00FF;">
        <div class="mb-4">
            <form action="{{ route('search-review') }}" method="get" class="d-flex justify-content-between align-items-center">
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
                    <input type="text" id="searchIntermediary" name="search" class="form-control py-2 px-4 border border-gray-300 rounded-md" placeholder="Enter search criteria">
                    <select id="intermediaryCategory" name="category" class="form-control mt-2 py-2 px-4 border border-gray-300 rounded-md" required>
                        @foreach($middlemanTypes as $value => $description)
                            <option value="{{ $value }}">{{ $description }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">
                    Search
                </button>
            </form>
            <button class="btn btn-danger mt-4" onclick="toggleForm('addIntermediaryForm')">
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
            <div class="mb-3">
                <label for="intermediaryName" class="form-label">Name</label>
                <input type="text" id="intermediaryName" name="name" class="form-control" placeholder="Enter name" required>
            </div>
            <div class="mb-3">
                <label for="intermediaryLink" class="form-label">Link</label>
                <input type="text" id="intermediaryLink" name="link" class="form-control" placeholder="Enter link">
            </div>
            <div class="mb-3">
                <label for="intermediaryCategory" class="form-label">Category</label>
                <select id="intermediaryCategory" name="category" class="form-control" required>
                    @foreach($middlemanTypes as $value => $description)
                        <option value="{{ $value }}">{{ $description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="intermediaryReview" class="form-label">Review</label>
                <textarea id="intermediaryReview" name="text" class="form-control" placeholder="Enter review" required></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Save</button>
        </form>

        <div class="row mt-2">
            <div class="col">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3">Category</th>
                            <th class="p-3">Name</th>
                            <th class="p-3">Link</th>
                            <th class="p-3">Reviews</th>
                            <th class="p-3"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td class="p-3">{{  \App\Enums\MiddlemanTypeEnum::toSelectArray()[$review->category] }}</td>
                                <td class="p-3"><a href="{{ route('show-review',$review->id) }}">{{ $review->name }}</a></td>
                                <td class="p-3"><a href="{{ $review->link }}">{{ $review->link }}</a></td>
                                <td class="p-3">{{ $review->text }}</td>
                                <td class="p-3 text-center">
                                    <button class="btn btn-success" onclick="window.location.href='{{ route('show-review',$review->id) }}'">ADD COMMENT ({{ $review->comments->count() }})</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
