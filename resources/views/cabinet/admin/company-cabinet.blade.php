<x-app-layout>
    <x-slot name="header">
        <h2 class="font-weight-bold text-xl text-dark">
            {{ $partner->name }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            @hasrole('user-admin')
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card shadow-sm mb-5">
                        <div class="card-body">
                            <h2 class="text-center font-weight-bold text-xl mb-4">
                                <a href="#">{{ $partner->name }}</a>
                            </h2>

                            @if($partner->currentTocken->count() > 0)
                                <div class="mt-4">
                                    <div>This token for your API requests.</div>
                                    <div class="input-group mb-3">
                                        <input type="text" id="token" class="form-control" value="{{ $partner->currentTocken->last()->token }}" readonly>
                                        <button class="btn btn-success" onclick="copyToken()">Copy Token</button>
                                    </div>
                                    <button class="btn btn-warning" onclick="window.location.href='{{ route('token-update',$partner->currentTocken->last()->id) }}'">Update Token</button>
                                </div>
                            @else
                                <div class="mt-4">
                                    <div>To access the full functionality of the system and obtain a token for information exchange via the API (server-to-server),
                                        you are required to make a membership contribution to participate in our system.</div>
                                    <button class="btn btn-success mt-2" onclick="window.location.href='{{ route('packet-page') }}'">Page with descriptions of membership contributions.</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mx-auto">
                    <div class="card shadow-sm mb-5">
                        <div class="card-body">
                            <form method="post" action="{{ route('update-partner',$partner->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" id="companyName" name="name" class="form-control" value="{{ $partner->name }}" placeholder="Enter your company name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="companyType" class="form-label">Company Type</label>
                                    <select id="companyType" name="type" class="form-control" required>
                                        @foreach(\App\Enums\PartnersTypeEnum::toSelectArray() as $value => $description)
                                            @if($value == $partner->type)
                                                <option value="{{ $value }}" selected>{{ $description }}</option>
                                            @else
                                                <option value="{{ $value }}">{{ $description }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
                function copyToken() {
                    var tokenField = document.getElementById('token');
                    tokenField.select();
                    document.execCommand('copy');
                }
            </script>

    <div class="bg-white overflow-hidden shadow-xl rounded-lg p-4 mt-4">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-center">
                <tr>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partner->users as $user)
                    <tr>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4">{{ $user->roles->first()->name }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endhasrole

            @livewire('input-user')

            @livewire('input-encrypt')

            @livewire('intermediaries')

        </div>
    </div>
</x-app-layout>



