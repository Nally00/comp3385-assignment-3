<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Event</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#eaf6f3;">


<nav class="navbar navbar-light bg-white border-bottom">
    <div class="container d-flex justify-content-between align-items-center" style="max-width: 1100px;">

       
        <div class="d-flex align-items-center gap-4">
            <a class="fw-bold text-decoration-none text-dark" href="/dashboard">Events Board</a>

            <a class="text-decoration-none text-dark" style="font-size:0.95rem;" href="/dashboard">Events</a>
          
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

<div class="container py-4" style="max-width: 900px;">

    <div class="mb-3">
        <h4 class="mb-1">Create New Event</h4>
        <p class="text-muted mb-0" style="font-size: 0.95rem;">
            Fill out the details below to publish a new community event
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            Please fix the errors below.
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-4">
            <h6 class="fw-bold mb-1">Event Details</h6>
            <p class="text-muted mb-3" style="font-size: 0.9rem;">Basic information about the event</p>

            <form method="POST" action="/community-events" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Event Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control"
                           value="{{ old('title') }}" placeholder="e.g. Summer Community Festival">
                    @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Venue <span class="text-danger">*</span></label>
                    <input type="text" name="venue" class="form-control"
                           value="{{ old('venue') }}" placeholder="e.g. Riverside Park, Main Pavilion">
                    @error('venue') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Starts At <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="starts_at" class="form-control"
                           value="{{ old('starts_at') }}">
                    @error('starts_at') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" rows="4"
                              placeholder="Describe the event...">{{ old('description') }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Banner Image</label>
                    <input type="file" name="banner_image" class="form-control">
                    <small class="text-muted">PNG, JPG or WebP up to 5MB</small><br>
                    @error('banner_image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <button type="submit" class="btn btn-success">Publish Event</button>
            </form>
        </div>
    </div>

</div>
</body>
</html>