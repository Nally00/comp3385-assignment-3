<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#eaf6f3;">


<nav class="navbar navbar-light bg-white border-bottom">
    <div class="container d-flex justify-content-between align-items-center" style="max-width: 1100px;">

        
        <div class="d-flex align-items-center gap-4">
            <a class="fw-bold text-decoration-none text-dark" href="/dashboard">Events Board</a>

            <a class="text-decoration-none text-dark" style="font-size:0.95rem;" href="/dashboard">Events</a>
            <a class="text-decoration-none text-dark" style="font-size:0.95rem;" href="/community-events/add">Create Event</a>
        </div>

       
        <div class="d-flex align-items-center gap-3">
            <span class="badge rounded-pill bg-secondary">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </span>

            <span class="text-muted" style="font-size:0.9rem;">
                {{ auth()->user()->name }}
            </span>


            <form method="POST" action="{{ route('logout') }}" class="d-inline ms-3">
                @csrf
                <button type="submit" class="btn btn-outline-secondary btn-sm">Log out</button>
            </form>

        </div>

    </div>
</nav>

<div class="container py-4" style="max-width: 1100px;">

   
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h3 class="fw-bold mb-1">Dashboard</h3>
            <p class="text-muted mb-0">Browse and manage community events</p>
        </div>

        <a href="/community-events/add" class="btn btn-success btn-sm">+ New Event</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($events->count() === 0)
        <p>No community events yet.</p>
    @else
        <div class="row">
            @foreach ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        @if ($event->banner_image)
                            <img src="{{ asset('storage/' . $event->banner_image) }}"
                                 class="card-img-top"
                                 style="height:170px; object-fit:cover;"
                                 alt="Event Banner">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:170px;">
                                <span class="text-muted" style="font-size:0.9rem;">No banner</span>
                            </div>
                        @endif

                        <div class="card-body">
                            <h6 class="fw-bold mb-2">{{ $event->title }}</h6>

                            <div class="text-muted" style="font-size:0.9rem;">
                                <div><strong>Starts:</strong> {{ \Carbon\Carbon::parse($event->starts_at)->format('D, M j, Y g:i A') }}</div>
                                <div><strong>Venue:</strong> {{ $event->venue }}</div>
                            </div>

                            <p class="mt-2 mb-0" style="font-size:0.9rem;">
                                {{ \Illuminate\Support\Str::limit($event->description, 120) }}
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>