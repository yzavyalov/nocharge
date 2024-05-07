<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-xl text-gray-800">
            Add your company
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="post" action="{{route('create-partner')}}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="mb-3">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" id="companyName" name="name" class="form-control" placeholder="Enter your company name" required>
                            </div>

                            <div class="mb-3">
                                <label for="companyType" class="form-label">Company Type</label>
                                <select id="companyType" name="type" class="form-control" required>
                                    @foreach(\App\Enums\PartnersTypeEnum::toSelectArray() as $value => $description)
                                        <option value="{{ $value }}">{{ $description }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Registration</button>
                            </div>
                        </form>

                        <div class="mt-4">
                            After submitting the form, you will need to pay for participation in our system. Your email will be assigned the status of company manager. You will be able to agree rights to other persons who make a request to you. You will also have access to a secret token, which will need to be added to the headers of your requests. You will be able to make an unlimited number of queries to the database both from your account manually and using the API automatically.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



