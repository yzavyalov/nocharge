<x-app-layout>
    <x-slot name="header">
        <div class="card text-center p-4">
            <h2 class="text-xl text-gray-800 leading-tight">
                Update link
            </h2>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">

                <form action="{{ route('cabinet-links.update',$link->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-auto mt-2">
                        <label for="link" class="visually-hidden">Link</label>
                        <input type="text" class="form-control" name="link" id="link" value="{{$link->link}}">
                    </div>
                    <div class="col-auto mt-2">
                        <label for="title" class="visually-hidden">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$link->title}}">
                    </div>
                    <div class="col-auto mt-2">
                        <label for="description" class="visually-hidden">Description</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{$link->description}}">
                    </div>
                    <div class="col-auto mt-2">
                        <button type="submit" class="btn btn-primary mb-3">Change Link</button>
                    </div>
                </form>
        </div>
    </div>
</x-app-layout>
