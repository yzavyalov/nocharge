<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $partner->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @hasrole('user-admin')

            <div class="flex flex-col space-y-4">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
                        <h2 class="text-center font-bold text-xl mb-4">
                            <a href="#">{{ $partner->name }}</a>
                        </h2>

                        @if($partner->currentTocken->count() > 0)
                            <div class="mt-4">
                                <div>This token for your API requests.</div>
                                <input type="text" id="token" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ \Illuminate\Support\Facades\Auth::user()->getRememberToken() }}" readonly>
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-2 rounded" onclick="copyToken()">Copy Token</button>
                            </div>
                        @else
                        <div class="mt-4">
                            <div>To access the full functionality of the system and obtain a token for information exchange via the API (server-to-server),
                                you are required to make a membership contribution to participate in our system.</div>
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mt-2 rounded" onclick="window.location.href='{{ route('packet-page') }}'">Page with descriptions of membership contributions.</button>
                        </div>
                        @endif
                    </div>
            </div>



            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
                <form method="post" action="{{ route('update-partner',$partner->id) }}">
                    @csrf
                    <div>
                        <label for="companyName" class="block text-sm font-medium text-gray-700">Company Name</label>
                        <input type="text" id="companyName" name="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ $partner->name }}" placeholder="Enter your company name" required>
                    </div>

                    <div class="mt-4">
                        <label for="companyType" class="block text-sm font-medium text-gray-700">Company Type</label>
                        <select id="companyType" name="type" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                            @foreach(\App\Enums\PartnersTypeEnum::toSelectArray() as $value => $description)
                                @if($value == $partner->type)
                                    <option value="{{ $value }}" selected>{{ $description }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $description }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>

            <script>
                function copyToken() {
                    var tokenField = document.getElementById('token');
                    tokenField.select();
                    document.execCommand('copy');
                }
            </script>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
                <table class="max-w-full">
                    <thead>
                    <tr class="text-center">
                        <th class="py-2 px-4 text-left">Email</th>
                        <th class="py-2 px-4 text-left">Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partner->users as $user)
                        <tr class="text-left">
                            <td class="py-2 px-4">{{ $user->email }}</td>
                            <td class="py-2 px-4">{{ $user->roles->first()->name }}</td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endhasrole

            @livewire('input-user')

            @livewire('intermediaries')

        </div>
    </div>
</x-app-layout>



