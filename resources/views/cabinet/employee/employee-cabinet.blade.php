<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="py-12">
        <div class="container">
            @if (session('error-activity-token'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error-activity-token') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">
                        @foreach($user->partners as $partner)
                            {{$partner->name}}
                        @endforeach
                    </h3>
                    <div>
                        <h3>Your claim:</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Admin email</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user->claims as $claim)
                                <tr>
                                    <td>{{ \Carbon\Carbon::make($claim->created_at)->format('d-m-Y') }}</td>
                                    <td>{{ $claim->admin->email }}</td>
                                    <td>
                                        @if($claim->status == 1)
                                            <span class="badge badge-primary">Created</span>
                                        @elseif($claim->status == 2)
                                            <span class="badge badge-success">Agreed</span>
                                        @else
                                            <span class="badge badge-danger">Canceled</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    @livewire('input-user')
                </div>
                <div class="col-md-6">
                    @livewire('input-encrypt')
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    @livewire('intermediaries')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
