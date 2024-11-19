<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold h4 text-dark">
            Create payment
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="flex flex-col space-y-4">
                    <!-- Payment Information Card -->
                    <div class="card bg-white shadow-xl sm:rounded-lg p-8 mt-8">
                        <h2 class="text-center font-bold text-xl mb-4">
                            We accept funds through USDT
                        </h2>
                        <div class="text-center">
                            You have chosen to make a payment of
                            <strong><input type="text" id="sum" name="sum" value="{{ $sum }}"> USDT</strong>.
                            If you have decided to proceed with this payment, please press the button <strong>"Ok, I'll pay"</strong>. Alternatively, you can confirm the payment execution in the admin's cabinet later. After making the payment, please inform our manager and provide them with the transaction hash.

                            <div class="mt-4">
                                <div class="row">
                                    <div class="col">
                                        <!-- TRC20 Wallet Section -->
                                        <div><strong>USDT wallet TRC20 Network</strong></div>
                                        <div>{{ env('USDT_NUMBER_TRC') }}</div>
                                        <div>
                                            <button class="btn btn-primary copyWalletButton" data-wallet="{{ env('USDT_NUMBER_TRC') }}">COPY TRC20 Wallet</button>
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ env('USDT_NUMBER_TRC') }}&size=200x200" alt="TRC20 Wallet QR Code" class="mt-4">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- ERC20 Wallet Section -->
                                        <div><strong>USDT wallet ERC20 Network</strong></div>
                                        <div>{{ env('USDT_NUMBER_ERC') }}</div>
                                        <div>
                                            <button class="btn btn-primary copyWalletButton" data-wallet="{{ env('USDT_NUMBER_ERC') }}">COPY ERC20 Wallet</button>
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ env('USDT_NUMBER_ERC') }}&size=200x200" alt="ERC20 Wallet QR Code" class="mt-4">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-4">
                                        <!-- "Ok I'll pay" Button -->
                                        <button class="btn btn-success" onclick="submitPayment()">Ok I'll pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Copy Wallet Functionality
            var copyButtons = document.querySelectorAll('.copyWalletButton');
            copyButtons.forEach(function(button) {
                button.addEventListener('click', function () {
                    var walletNumber = this.getAttribute('data-wallet');
                    var tempInput = document.createElement('input');
                    tempInput.value = walletNumber;
                    document.body.appendChild(tempInput);
                    tempInput.select();

                    try {
                        document.execCommand('copy');
                        alert('Wallet number copied to clipboard: ' + walletNumber);
                    } catch (err) {
                        console.error('Unable to copy to clipboard:', err);
                    } finally {
                        document.body.removeChild(tempInput);
                    }
                });
            });

            // Payment Submission Function
            window.submitPayment = function () {
                var sum = document.getElementById('sum').value;
                if (!sum) {
                    alert('Please enter an amount.');
                    return;
                }

                // Redirect with sum value
                window.location.href = `{{ route('save-payment', '') }}/${sum}`;
            };
        });
    </script>
</x-app-layout>
