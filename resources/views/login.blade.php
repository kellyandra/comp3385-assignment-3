
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <h2 class="text-center mt-5">Login</h2>
            <form method="POST" action="{{ route('login.store') }}"  class="mt-4">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <small class="text-danger">*</small>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div> 

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <small class="text-danger">*</small>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <button type="submit" class="btn btn-info w-100">Login</button>
            </form>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
