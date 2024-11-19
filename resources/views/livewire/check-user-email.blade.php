<div class="container mt-4" id="checkUserEmails">
    <div class="card bg-white shadow-xl rounded-lg p-4" style="border: 5px solid #19FFFF; padding: 3px;">
        <div>
            <h3 class="text-xl font-semibold mb-4">Check User's email</h3>
            <p>In this module, we verify emails against a temporary service that allows you to quickly create an email and get a link to it for verification. We can assume that a user who uses such an email is not going to build a long-term relationship with you.  </p>
            <form method="post" action="{{ route('check-email') }}" enctype="multipart/form-data">
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

                @if (session('emailStatus'))
                    @if(session('emailStatus') == 0)
                            <div class="alert alert-danger" role="alert">
                                <p>We couldn't get information about this email</p>
                            </div>
                        @elseif(session('emailStatus') == 1)
                            <div class="alert alert-danger" role="alert">
                                <p>This temporary email from the list of test domains</p>
                            </div>
                        @elseif(session('emailStatus') == 2)
                            <div class="alert alert-danger" role="alert">
                                <p>This email was registered less than 1 month ago</p>
                            </div>
                        @else
                            <div class="alert alert-success" role="alert">
                                <p>Email is fine.</p>
                            </div>
                    @endif

                @endif
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input wire:model="email" type="text" id="email" name="email" class="form-control py-2 px-4 border border-primary rounded w-full mb-2" placeholder="Your customer's email" oninput="encryptInput(this)">
                </div>

                <div class="flex items-center justify-between mt-4">
                    <button type="submit" class="btn btn-primary">
                        Check Email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

