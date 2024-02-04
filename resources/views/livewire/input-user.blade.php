<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mt-8">
    <h3>Add user, who's made a chargeback</h3>
    <form method="post" action="{{ route('addCheckUsers') }}" enctype="multipart/form-data">
        @if (session('success-add-check'))
            <div class="bg-green-200 border-l-4 border-green-500 p-4 mb-4">
                <p class="text-green-700">{{ session('success-add-check') }}</p>
            </div>
        @endif
        @csrf
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input wire:model="email" type="text" id="email" name="email" class="py-2 px-4 border border-blue-500 rounded w-full mb-2" placeholder="Your customer's email" oninput="encryptInput(this)">
            <div>SHA256 - </div><div class="flex-grow ml-3" id="hashedValue"></div>
        </div>
             <input id="file-upload" type="file" name="file" class="relative cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md focus-within:outline-none focus-within:ring focus-within:ring-blue-500">
      <!-- Add other fields as needed (ip, browser, agent, platform) -->
            {{--            <input  value="{{ $partner }}">--}}
        <div class="flex items-center justify-between mt-4">
            <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                Add User
            </button>
        </div>
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script>
        function encryptInput(input) {
            let hashedValue = CryptoJS.SHA256(input.value).toString(CryptoJS.enc.Hex);
            document.getElementById('hashedValue').innerText = hashedValue;
            Livewire.emit('updateHashedEmail', hashedValue);
        }

        function copyToClipboard() {
            let hashedValue = document.getElementById('hashedValue').innerText;
            navigator.clipboard.writeText(hashedValue).then(function() {
                alert('Copied to clipboard!');
            }).catch(function() {
                alert('Unable to copy to clipboard. Please copy it manually.');
            });
        }
    </script>



</div>
