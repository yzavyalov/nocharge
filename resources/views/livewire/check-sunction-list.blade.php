<div class="container mt-4" id="sunctionList">
    <div class="card bg-white shadow-xl rounded-lg p-4" style="border: 5px solid #33FF33; padding: 3px;">
        <div>
            <h3 class="text-xl font-semibold mb-4">Checking against sanctions lists</h3>
            <p>The check in this block is based on the user's full name.</p>
            <form method="post" action="{{ route('check-sunction') }}" enctype="multipart/form-data">
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
                    <label for="organisation" class="block text-sm font-medium text-gray-700">Select base</label>
                    <select name="organisation" id="organisation" class="form-select py-2 px-4 border border-success rounded w-full mb-2">
                       <option value="2">Company</option>
                       <option value="1">Person</option>
                       <option value="0" selected>I don't know</option>
                    </select>
                </div>


                <div class="mb-4">
                    <label for="base" class="block text-sm font-medium text-gray-700">Select base</label>
                    <select name="base" id="base" class="form-select py-2 px-4 border border-success rounded w-full mb-2">
                        <option value="2">PEPs</option>
                        <option value="1">Sunctions</option>
                        <option value="0" selected>I don't know</option>
                    </select>
                </div>


                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">User's name</label>
                    <input type="text" id="name" name="name" class="form-control py-2 px-4 border border-success rounded w-full mb-2" placeholder="Your customer's full name" oninput="encryptInput(this)">
                </div>

                <div class="mb-4">
                    <label for="birthDate" class="block text-sm font-medium text-gray-700">User's birthDate(year)</label>
                    <input type="text" id="birthDate" name="birthDate" class="form-control py-2 px-4 border border-success rounded w-full mb-2" placeholder="Your customer's full name" oninput="encryptInput(this)">
                </div>

                <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <select name="country" id="country" class="form-select py-2 px-4 border border-success rounded w-full mb-2">
                        @foreach($countries as $code => $name)
                            <option value="{{ $code }}">{{ $name }}</option>
                        @endforeach
                            <option value="0" selected>I don't know the country</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="taxnumber" class="block text-sm font-medium text-gray-700">Taxnumber</label>
                    <input type="text" id="taxnumber" name="taxnumber" class="form-control py-2 px-4 border border-success rounded w-full mb-2" placeholder="Your customer's full name" oninput="encryptInput(this)">
                </div>


                    <div class="flex items-center justify-between mt-4">
                    <button type="submit" class="btn btn-success">
                        Check
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--Организация поиска. Person or Organization  key schema--}}
{{--key birthDate   "1982"--}}
{{--key registrationNumber for Organization--}}
{{--key taxNumber for Person--}}
{{--key country "au"--}}
{{--select sanctions or peps or all--}}
