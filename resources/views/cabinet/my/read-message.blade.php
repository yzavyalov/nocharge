<x-app-layout>
    <x-slot name="header">
        <div class="card text-center p-4">
            <h2 class="text-xl text-gray-800 leading-tight">
                SuperAdmin's Cabinet
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <h3 class="card-title text-xl font-semibold">Messages</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Author</th>
                                        <th>Author's Email</th>
                                        <th>Subject</th>
                                        <th>Text</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{ $message->id }}</td>
                                        <td>{{ $messageTypes[$message->status] }}</td>
                                        <td>{{ $message->created_at }}</td>
                                        <td>{{ $message->author->name }}</td>
                                        <td>{{ $message->author->email }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ $message->text }}</td>
                                        <td>{{ $message->created_at }}</td>
                                        <td>
                                            <form action="{{ route('del-message', $message->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <form class="mt-3" action="{{ route('send-answer') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="answer_text" class="form-control" rows="4" placeholder="Write your answer here"></textarea>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $message->user_id }}">
                        <input type="hidden" name="subject" value="{{ $message->subject }}">
                        <input type="hidden" name="message_id" value="{{ $message->id }}">
                        <button type="submit" class="btn btn-primary">Send Answer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
