<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SuperAdmin's Cabinet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col space-y-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
            <!-- Payments Table -->
            <div class="border p-4 mb-4">
                <h3 class="text-xl font-semibold">Messages</h3>
                <!-- Your payments table goes here -->
                <!-- Example: -->
                <table class="text-center w-full">
                    <!-- Payment rows with CONFIRM button -->
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>data</th>
                            <th>status</th>
                            <th>author</th>
                            <th>author's email</th>
                            <th>subject</th>
                            <th>text</th>
                            <th>created_at</th>
                            <th></th>
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
                            <td>
                                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('read-message',$message->id) }}'">
                                        READ
                                    </button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='{{ route('del-message',$message->id) }}'">
                                    DELETE
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <!-- Repeat for other payments -->
                </table>
            </div>
        </div>
    </div>

        </div>
    </div>
</x-app-layout>

