<div class="container mt-4">
    <div class="card" style="padding: 3px; border: 5px solid #FF9933;">
        @if (session('success-check'))
            <div class="alert alert-danger" role="alert">
                <p class="text-danger">{{ session('success-check') }}</p>
            </div>
        @endif

        @if (session('error-check'))
            <div class="alert alert-success" role="alert">
                <p class="text-success">{{ session('error-check') }}</p>
            </div>
        @endif

        <form action="{{ route('check') }}" method="post">
            @csrf
            <div class="d-flex justify-content-between align-items-center p-3">
                <div class="flex-grow-1">
                    You can check if your customer's email address is in our database. If one of our partners has entered it into the database, this client is defined as untrustworthy. You can then decide whether or not to provide them with services. Please note that client data is stored in our database in encrypted form (<strong>SHA-256</strong> encryption algorithm). This is done to protect the data. In this regard, you can specify your e-mail as an e-mail (then our system will encrypt it before comparing it with the database) or in encrypted form (but only using the same algorithm).
                    <input wire:model="email" type="text" id="input-email1" name="email" class="form-control w-80 mb-2" placeholder="Your customer's email" oninput="encryptInput1(this)">
                    <button class="btn btn-primary">
                        Submit
                    </button>
                    <!-- ... (остальной код) ... -->
                </div>
            </div>
        </form>
        <div class="mt-2 p-3" style="padding: 3px;">
            <p class="text-muted">Your email in SHA256</p>
            <div class="d-flex align-items-center">
                <button class="btn btn-success" onclick="copyToClipboard1()">
                    COPY
                </button>
                <div class="flex-grow-1 ml-3" id="hashedValue1"></div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
<script>
    function encryptInput1(input) {
        let inputElement = document.getElementById('input-email1');
        let hashedValue = CryptoJS.SHA256(inputElement.value).toString(CryptoJS.enc.Hex);
        document.getElementById('hashedValue1').innerText = hashedValue;
        Livewire.emit('updateHashedEmail', hashedValue);
    }

    function copyToClipboard1() {
        let hashedValue = document.getElementById('hashedValue1').innerText;
        navigator.clipboard.writeText(hashedValue).then(function() {
            alert('Copied to clipboard!');
        }).catch(function() {
            alert('Unable to copy to clipboard. Please copy it manually.');
        });
    }
</script>
