@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    Catalogue.
@endsection
@section('description')
Our participants consist of online enterprises engaged in the facilitation and management of user payments. We are committed to fostering seamless communication among these entities and furnishing them with cutting-edge tools to mitigate their operational costs.
During the global online payment process, certain challenges arise, accounting for approximately 10% of their turnover. These include customers abusing chargebacks and unscrupulous intermediaries misappropriating funds from their merchants.
Our endeavor focuses on facilitating the exchange of information regarding such entities among participants to prevent financial losses and reduce expenses. We have devised innovative mechanisms to automate the information exchange process, thereby reducing losses to around 3%, enhancing the efficiency and resilience of our partners in the online payment sphere.
@endsection
@section('img')
    {{ asset('img/Logo.png') }}
@endsection

@section('content')
    <div class="container main">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>Black List</h2>
            </div>
        </div>
        <div class="row">

            <div class="container mt-4">
                <div class="p-4 mt-4">
                    <form action="{{ route('select-front-review') }}" method="get">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="d-flex flex-wrap">
                            <input name="status" value="1" type="hidden">
                            <div class="form-group flex-grow-1 mr-2">
                                <input type="text" id="searchIntermediary" name="search" class="form-control border border-gray-300 rounded-md" placeholder="Enter search criteria">
                            </div>
                            <div class="form-group mr-2">
                                <select id="intermediaryCategory" name="category" class="form-control border border-gray-300 rounded-md" required>
                                    @foreach($middlemanTypes as $value => $description)
                                        <option value="{{ $value }}">{{ $description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-info" type="submit">
                                Search
                            </button>
                        </div>
                    </form>


                    <div class="table-responsive mt-2">
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
                                        <button class="btn btn-success" onclick="window.location.href='{{ route('login') }}'">ADD COMMENT ({{ $review->comments->count() }})</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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



        </div>
    </div>
@endsection
