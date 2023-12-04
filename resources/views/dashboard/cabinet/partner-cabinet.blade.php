<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Partner's cabinet
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @hasrole('user-admin')
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
                <h2 class="text-center font-bold text-xl mb-4">{{ $partner->name }}</h2>
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

                <div class="mt-4">
                    <div>This token for your API requests.</div>
                    <label for="token" class="block text-sm font-medium text-gray-700">Token</label>
                    <input type="text" id="token" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ \Illuminate\Support\Facades\Auth::user()->getRememberToken() }}" readonly>
                    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="copyToken()">Copy Token</button>
                </div>
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
                    <tr>
                        <th class="py-2 px-4 text-left">Email</th>
                        <th class="py-2 px-4 text-left">Role</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($partner->users as $user)
                        <tr class="text-center">
                            <td class="py-2 px-4">{{ $user->email }}</td>
                            <td class="py-2 px-4">{{ $user->roles->first()->name }}</td>
                            <td class="py-2 px-4 text-center">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Active</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endhasrole

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
                <form method="post" action="{{ route('check') }}">
                    @csrf
                    <div>
                        <label for="checkEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="checkEmail" name="email" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter email" required>
                    </div>

                    <!-- Add other fields as needed (ip, browser, agent, platform) -->

                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                            Check
                        </button>
                    </div>
                </form>
            </div>


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
                <form method="post" action="{{ route('save-intermediary') }}">
                    @csrf
                    <div>
                        <label for="intermediaryName" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="intermediaryName" name="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter name" required>
                    </div>

                    <div class="mt-4">
                        <label for="intermediaryCategory" class="block text-sm font-medium text-gray-700">Category</label>
                        <input type="text" id="intermediaryCategory" name="category" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter category" required>
                    </div>

                    <div class="mt-4">
                        <label for="intermediaryReview" class="block text-sm font-medium text-gray-700">Review</label>
                        <textarea id="intermediaryReview" name="review" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter review" required></textarea>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Save
                        </button>
                    </div>
                </form>

                <div class="mt-4">
                    <label for="searchIntermediary" class="block text-sm font-medium text-gray-700">Search Intermediary</label>
                    <input type="text" id="searchIntermediary" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter search criteria">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Search
                    </button>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>



