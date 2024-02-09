<x-app-layout>

    <x-slot name="header">
        <div class="card text-center p-4">
            <h2 class="text-xl text-gray-800 leading-tight">
                SuperAdmin's Contacts
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title text-center font-weight-bold">Messages</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Author</th>
                                        <th>Author's Email</th>
                                        <th>Subject</th>
                                        <th>Text</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr>
                                            <td>{{ $message->id }}</td>
                                            <td>{{ $message->created_at }}</td>
                                            <td>{{ $messageTypes[$message->status] }}</td>
                                            <td>{{ $message->author->name }}</td>
                                            <td>{{ $message->author->email }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ $message->text }}</td>
                                            <td>{{ $message->created_at }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm" onclick="window.location.href='{{ route('read-message',$message->id) }}'">Read</button>
                                                <button class="btn btn-danger btn-sm" onclick="window.location.href='{{ route('del-message',$message->id) }}'">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

