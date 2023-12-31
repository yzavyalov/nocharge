<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
        <form action="{{ route('check') }}" method="post">
            @csrf
            <div class="flex items-center justify-between">
                <div class="flex-grow">
                    You can check if your customer's email address is in our database. If one of our partners has entered it into the database, this client is defined as untrustworthy. You can then decide whether or not to provide them with services. Please note that client data is stored in our database in encrypted form (<strong>SHA-256</strong> encryption algorithm). This is done to protect the data. In this regard, you can specify your e-mail as an e-mail (then our system will encrypt it before comparing it with the database) or in encrypted form (but only using the same algorithm).
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <div class="flex-grow">
                    <input wire:model="email" type="text" id="email" name="email" class="py-2 px-4 border border-blue-500 rounded w-80 mb-2" placeholder="Your customer's email" oninput="encryptInput(this)">
                    <button class="ml-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Submit
                    </button>
                </div>
            </div>
        </form>
        <div class="mt-2">
            <p class="text-gray-700">Your email in SHA256</p>
            <div class="flex items-center">
                <button class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="copyToClipboard()">
                    COPY
                </button>
                <div class="flex-grow ml-3" id="hashedValue">{{$hashedEmail}}</div>
            </div>
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
