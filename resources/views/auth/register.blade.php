<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simudah - Register</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}" />

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-fluid">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />

                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- Username -->
                                <div class="form-group">
                                    <x-label for="username" :value="__('Username')" />
                                    <input type="text" class="form-control form-control-user" id="username"
                                        name="username" :value="old('username')" required autofocus
                                        placeholder="Enter Username">
                                </div>

                                <!-- Name -->
                                <div class="form-group">
                                    <x-label for="name" :value="__('Name')" />
                                    <input type="text" class="form-control form-control-user" id="name"
                                        name="name" :value="old('name')" required placeholder="Enter Name">
                                </div>

                                <!-- Email Address -->
                                <div class="form-group">
                                    <x-label for="email" :value="__('Email')" />
                                    <input type="email" class="form-control form-control-user" id="email"
                                        name="email" :value="old('email')" required
                                        placeholder="Enter Email Address">
                                </div>

                                <!-- Password -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <x-label for="password" :value="__('Password')" />
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password" required placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <input type="password" class="form-control form-control-user"
                                            id="password_confirmation" name="password_confirmation" required
                                            placeholder="Confirm Password">
                                    </div>
                                </div>

                                <!-- User Role -->
                                <div class="form-group">
                                    <label for="role" class="form-label">User Role</label> <br>
                                    <select name="role" class="form-control" required>
                                        <option value="ketuaMahasiswa">ketuaMahasiswa</option>
                                        <option value="pembina">pembina</option>
                                        <option value="pelatih">pelatih</option>
                                        <option value="adminKeuangan">adminKeuangan</option>
                                        <option value="adminSimudah">adminSimudah</option>
                                        <option value="bidangKemahasiswaan">bidangKemahasiswaan</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Register') }}
                                </button>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
