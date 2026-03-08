<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container py-5">
    <div class="mx-auto" style="max-width: 420px;">

        <div class="text-center mb-3">
            <h5 class="fw-bold">Community Events Board</h5>
            <p class="text-muted">Sign in to manage community events</p>
        </div>

        <div class="card">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Sign In</h6>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        Invalid credentials. Check the email address and password entered
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button class="btn btn-success w-100" type="submit">Sign In</button>
                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3" style="font-size: 0.9rem;">
            Don't have an account? Contact your admin
        </p>

    </div>
</div>
</body>
</html>