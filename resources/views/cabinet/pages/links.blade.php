<x-app-layout>
    <x-slot name="header">
        <div class="card text-center p-4">
            <h2 class="text-xl text-gray-800 leading-tight">
                Useful links
            </h2>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">

                <form action="{{ route('cabinet-links.store') }}" method="post">
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
                        <input type="text" class="form-control" name="link" id="link" placeholder="link">
                    </div>
                    <div class="col-auto mt-2">
                        <label for="title" class="visually-hidden">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="title">
                    </div>
                    <div class="col-auto mt-2">
                        <label for="description" class="visually-hidden">Description</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="description">
                    </div>
                    <div class="col-auto mt-2">
                        <button type="submit" class="btn btn-primary mb-3">Add Link</button>
                    </div>
                </form>

            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>link</th>
                                <th>screen</th>
                                <th>title</th>
                                <th>description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($links as $link)
                            <tr>
                                <td>{{ $link->id }}</td>
                                <td>{{ $link->link }}</td>
                                <td>
                                    <img src="{{ $link->screen }}" alt="{{ $link->title }}" style="width: 50px; height: 50px">
                                </td>
                                <td>{{ $link->title }}</td>
                                <td>{{ $link->description }}</td>
                                <td>
                                    <button class="btn btn-warning" type="button" onclick="window.location.href='{{ route('cabinet-links.edit',$link->id) }}'">Change</button>
                                    <form action="{{ route('cabinet-links.destroy', $link->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
