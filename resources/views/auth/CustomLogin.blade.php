<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Custom styles for this template-->
    <link href={{ asset('admin/assets/css/sb-admin-2.min.css') }} rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <title>Login</title>
</head>

<body class="bg-light">
    <div class="wrapper row m-0 justify-content-center col-12 col-lg-7 p-0 shadow">
        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src={{ asset('admin/assets/images/undraw_posting_photo.svg') }} alt="">
        </div>
        <div class="col-12 col-lg-6 bg-white p-5">
            <h1 class="text-secondary">Banksoal</h1>
            <p>Login disini untuk download banksoal</p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <input class="form-control text-dark @error('nim') is-invalid @enderror" type="text" name="nim" id="nim" placeholder="NIM" required autocomplete="off">
                <input class="form-control my-3" type="password" name="password" id="password" placeholder="Password" required>
                <button class="btn btn-primary btn-block" type="submit">Login Gan</button>
                @error('nim')
                <div class="alert alert-danger mt-3" role="alert">
                    NIM atau Password Salah
                </div>
                @enderror
            </form>
        </div>
    </div>
</body>
<!-- Bootstrap core JavaScript-->
<script src={{ asset('admin/assets/vendor/jquery/jquery.min.js') }}></script>
<script src={{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>

<!-- Core plugin JavaScript-->
<script src={{ asset('admin/assets/vendor/jquery-easing/jquery.easing.min.js') }}></script>

<!-- Custom scripts for all pages-->
<script src={{ asset('admin/assets/js/sb-admin-2.min.js') }}></script>
</html>