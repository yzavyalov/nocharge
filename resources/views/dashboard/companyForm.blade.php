<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add your company
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <form method="post" action="{{route('create-partner')}}">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-500 text-white font-bold py-2 px-4 rounded"">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div>
                        <label for="companyName" class="block text-sm font-medium text-gray-700">Company Name</label>
                        <input type="text" id="companyName" name="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter your company name" required>
                    </div>

                    <div class="mt-4">
                        <label for="companyType" class="block text-sm font-medium text-gray-700">Company Type</label>
                        <select id="companyType" name="type" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                            @foreach(\App\Enums\PartnersTypeEnum::toSelectArray() as $value => $description)
                                <option value="{{ $value }}">{{ $description }}</option>
                            @endforeach
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Registration
                        </button>
                    </div>
                </form>

                <div class="mt-8">
                    After submitting the form, you will need to pay for participation in our system. Your email will be assigned the status of company manager. You will be able to agree rights to other persons who make a request to you. You will also have access to a secret token, which will need to be added to the headers of your requests. You will be able to make an unlimited number of queries to the database both from your account manually and using the API automatically.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



