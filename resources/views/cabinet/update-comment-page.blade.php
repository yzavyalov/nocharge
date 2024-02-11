<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 text-dark">
            Reviews of those you shouldn't work with
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="border p-4 mb-4">
                <h3 class="font-weight-bold h5">{{ $comment->baditem->name }}</h3>
                <p>{{  \App\Enums\MiddlemanTypeEnum::toSelectArray()[$comment->baditem->category] }}</p>
                <p>{{ $comment->baditem->link }}</p>
                <p>{{ $comment->baditem->text }}</p>

                <form id="addCommentForm" method="post" action="{{ route('update-comment',$comment->id) }}">
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
                    <!-- Your form fields for adding comments go here -->
                    <div class="form-group">
                        <input type="text" name="text" placeholder="Enter comment text" class="form-control mt-3" value="{{ $comment->text }}">
                    </div>
                    <button type="submit" class="btn btn-warning mt-2">
                        Update Comment
                    </button>
                </form>

                <!-- Comments Section -->
            </div>
        </div>
    </div>
    <script>
        function toggleForm(formId) {
            var form = document.getElementById(formId);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</x-app-layout>
