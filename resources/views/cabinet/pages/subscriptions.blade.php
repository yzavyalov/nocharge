<x-app-layout>
    <x-slot name="header">
        <div class="card text-center p-4">
            <h2 class="text-xl text-gray-800 leading-tight">
                Subscriptions
            </h2>
        </div>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row">{{ $subscriptions->total() }}</div>
            <div class="row">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>email</th>
                                <th>created_at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subscriptions as $subscription)
                            <tr>
                                <td>{{ $subscription->id }}</td>
                                <td>{{ $subscription->email }}</td>
                                <td>{{ $subscription->created_at }}</td>
                                <td>
                                    <button class="btn btn-danger" type="button" onclick="window.location.href='{{ route('delete-subscriptions',$subscription->id) }}'">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        {{ $subscriptions->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
