<div class="container mt-4" id="checkUserBlock">
    <div class="card bg-white shadow-xl rounded-lg p-4" style="border: 5px solid #FF3333; padding: 3px;">
        <div>
            <h3 class="text-xl font-semibold mb-4">Add user, who's made a chargeback</h3>
            <form method="post" action="{{ route('addCheckUsers') }}" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @csrf
                @if (session('success-add-check'))
                    <div class="alert alert-success" role="alert">
                        <p>{{ session('success-add-check') }}</p>
                    </div>
                @endif
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input wire:model="email" type="text" id="email" name="email" class="form-control py-2 px-4 border border-primary rounded w-full mb-2" placeholder="Your customer's email" oninput="encryptInput(this)">
                    <div class="text-muted">SHA256 - <span class="ml-1" id="hashedValue"></span></div>
                </div>
                <div class="mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <label for="file-upload" class="form-label mb-0">Choose File</label>
                        <a href="{{asset('storage/users.csv')}}" class="btn btn-outline-primary btn-sm" download>Download Sample File</a>
                    </div>
                    <input id="file-upload" type="file" name="file" class="form-control-file" style="display: none;" onchange="updateFileName(this)">
                    <label for="file-upload" class="btn btn-primary mt-2">
                        <i class="bi bi-upload"></i> <span id="file-name">Choose File</span>
                    </label>
                </div>
                <div class="flex items-center justify-between mt-4">
                    <button type="submit" class="btn btn-primary">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        document.getElementById('file-name').innerText = fileName;
    }
</script>



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

