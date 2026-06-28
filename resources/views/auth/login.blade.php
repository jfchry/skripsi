<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Smart Tourism Bukit Lawang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow border-0 p-3">
                <div class="card-body">
                    <h4 class="fw-bold text-center text-success mb-2">CMS LOGIN</h4>
                    <p class="text-muted text-center small mb-4">Smart Tourism Bukit Lawang & Villa Etalauser</p>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show py-2 px-3 small" role="alert">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label small fw-bold">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" required autofocus>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2 fw-bold">
                            Masuk Ke Dashboard
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
