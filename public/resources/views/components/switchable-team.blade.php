<form method="POST" action="{{ route('current-team.update') }}" x-data>
    @method('PUT')
    @csrf

    <!-- Hidden Team ID -->
    <input type="hidden" name="team_id" value="{{ $team->id }}">

    <button type="submit" class="btn btn-primary" x-on:click.prevent="$root.submit();">
        <div class="d-flex align-items-center">
            @if (Auth::user()->isCurrentTeam($team))
                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                    <path d="M11.646 4.354a.5.5 0 0 1 .708.708l-5 5a.5.5 0 1 1-.708-.708l3.146-3.146a.5.5 0 0 1 .708 0z"/>
                    <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm-7-7a7 7 0 0 1 7-7 7 7 0 0 1 0 14A7 7 0 0 1 1 8z"/>
                </svg>
            @endif

            <div class="truncate">{{ $team->name }}</div>
        </div>
    </button>
</form>

