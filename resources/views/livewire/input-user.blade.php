<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
    <h3>Add user, who's made a chargeback</h3>
    <form method="post" action="{{ route('add-code') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter email" required>
        </div>
        <div class="mt-4">
            <div class="flex items-center">
                <label for="user_file" class="relative cursor-pointer bg-white border border-purple-500 rounded-md font-medium text-purple-500 hover:bg-purple-500 hover:text-white focus-within:outline-none focus-within:ring focus-within:ring-purple-500">
                    <span class="ml-2">Upload File</span>
                    <input id="user_file" name="user_file" type="file" class="sr-only w-3/4 sm:w-full">
                </label>
                <span class="ml-2 text-gray-500">(CSV format)</span>
            </div>
        </div>

        <!-- Add other fields as needed (ip, browser, agent, platform) -->

        <div class="flex items-center justify-between mt-4">
            <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                Add User
            </button>
        </div>
    </form>




</div>
