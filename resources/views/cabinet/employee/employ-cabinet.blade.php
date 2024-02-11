<x-app-layout>
    <!-- Остальной код не изменен -->

    <div class="py-12">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Your Claim</div>
                        <div class="card-body">
                            <div class="mb-4">
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
                                    <tr>
                                        <td>{{ \Carbon\Carbon::make($user->lastClaim->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ $user->lastClaim->admin->email }}</td>
                                        <td>
                                            @if($user->lastClaim->status == 1)
                                                <span class="badge badge-primary">Created</span>
                                            @elseif($user->lastClaim->status == 2)
                                                <span class="badge badge-success">Agreed</span>
                                            @else
                                                <span class="badge badge-danger">Canceled</span>
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if(session('error'))
                                <div class="text-danger">{{ session('error') }}</div>
                            @endif
                            <button type="button" class="btn btn-primary mt-4" onclick="window.location.href='{{ route('dashboard') }}'">Return</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
