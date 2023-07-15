
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<section class="vh-100" style="background-color: #000409;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <h3 class="mb-5">Sound Nafahat Login</h3>

                        <form method="POST" action="{{ route('loginAdmin') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername">Username</label>
                                <input name = "username" type="text" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        @if($errors->any())
                            @foreach ($errors->all() as $error)
                                <h6 style="color: indianred">{{ $error }}</h6>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

