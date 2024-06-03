@extends('template.template')
@section('style')
    <link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('title')
    System for verifying user data in ludomaniac registries.
@endsection
@section('description')
    Our participants consist of online enterprises engaged in the facilitation and management of user payments. We are committed to fostering seamless communication among these entities and furnishing them with cutting-edge tools to mitigate their operational costs.
    During the global online payment process, certain challenges arise, accounting for approximately 10% of their turnover. These include customers abusing chargebacks and unscrupulous intermediaries misappropriating funds from their merchants.
    Our endeavor focuses on facilitating the exchange of information regarding such entities among participants to prevent financial losses and reduce expenses. We have devised innovative mechanisms to automate the information exchange process, thereby reducing losses to around 3%, enhancing the efficiency and resilience of our partners in the online payment sphere.
@endsection
@section('img')
    {{ asset('img/Logo.png') }}
@endsection

@section('content')
    <div class="container main">
        <div class="row mt-6 page-title">
            <div class="col title">
                <h2>System for verifying user data in ludomaniac registries</h2>
            </div>
        </div>
        <div class="container">
            <div class="row mb-4 mt-3 page-content">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form id="email-form" action="{{ route('add-ludo') }}" method="post">
                                @csrf
                                <p>Enter your email and the monthly limit that you are willing to spend at the casino. If the limit is 0, then you can not specify it or specify 0.</p>
                                <div class="mb-3">
                                    @if (session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                                    <span>Your encoded email: <span id="encoded-email" style="color: red"></span></span>
                                </div>
                                <div class="mb-3">
                                    <p>This is how we will store your email. No one can use it for spam. Also, by submitting your data, you understand and you are not opposed to the fact that we transfer it to third parties.</p>
                                </div>
                                <div class="mb-3">
                                    <label for="limit" class="form-label">Limit in USD</label>
                                    <input type="text" class="form-control" id="limit" name="limit">
                                </div>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title text-center">Hello!</h1>
                                    <p class="card-text">If you've found yourself on this page, it means you're battling a gambling addiction. We're glad you've taken this step and hope that your life will improve as a result. Many of our partners are online casinos. Even though they earn their revenue from providing entertainment services, they are socially responsible companies willing to let go of customers struggling with addiction.</p>
                                    <p class="card-text">To list your information, you only need to provide your email and the monthly limit you're willing to spend on a single site. </p>
                                    <p class="card-text">Rest assured, we do not share your data with casinos. Your email is stored in our database encrypted with the SHA-256 protocol. This protocol does not allow for data decryption but enables data comparison. Therefore, neither hackers, nor we, nor our partners will know your email, and no one will spam you or misuse your information. Only when you go through the standard registration on the casino sites will they encrypt your email using the same protocol and compare it with our database. If the comparison is successful, the casino will see your limit and set it for you in their system.</p>
                                    <p class="card-text">We also want to highlight that participation by casinos in our project is voluntary, and we cannot guarantee their commitment to restricting your play. However, all those listed have supported the project and demonstrate their commitment to taking this issue seriously.</p>
                                    <p class="card-text">To prevent our database from being cluttered with random emails, there is a $20 fee per email to be added to the database.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script>
        document.getElementById('email').addEventListener('input', function() {
            let email = document.getElementById('email').value;
            let hashedValue = CryptoJS.SHA256(email).toString(CryptoJS.enc.Hex);
            document.getElementById('encoded-email').innerText = hashedValue;
            Livewire.emit('updateHashedEmail', hashedValue);
        });
    </script>
@endsection
