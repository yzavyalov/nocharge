<div class="container mt-4">
    <div class="card bg-white shadow-xl sm:rounded-lg p-4" style="border: 5px solid #FF3333; padding: 3px;">
        <div>
            <h3 class="text-xl font-semibold mb-4">Add user, who's made a chargeback</h3>
            <form method="post" action="{{ route('addCheckUsers') }}" enctype="multipart/form-data">
                @csrf
                @if (session('success-add-check'))
                    <div class="alert alert-success" role="alert">
                        <p>{{ session('success-add-check') }}</p>
                    </div>
                @endif
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input wire:model="email" type="text" id="email" name="email" class="form-control py-2 px-4 border border-blue-500 rounded w-full mb-2" placeholder="Your customer's email" oninput="encryptInput(this)">
                    <div class="text-muted">SHA256 - <span class="ml-1" id="hashedValue"></span></div>
                </div>
                <div class="mb-4">
                    <input id="file-upload" type="file" name="file" class="form-control-file bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="btn btn-primary">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


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

