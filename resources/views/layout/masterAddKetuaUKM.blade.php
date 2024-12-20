<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMUDAH - Ketua UKM/HMJ</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}" />

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

</head>

<body id="page-top">


    <header id="header" class="header">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboardAdminSimudah">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">SIMUDAH</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="/dashboardAdminSimudah">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>


                <li class="nav-item active">
                    <a class="nav-link" href="/ukm">
                        <i class="fas fa-user-friends"></i>
                        <span>UKM/HMJ</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="/jadwalAdminSimudah">
                        <i class="fas fa-calendar"></i>
                        <span>Jadwal</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="/pengumumanAdminSimudah">
                        <i class="fas fa-bullhorn"></i>
                        <span>Pengumuman</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="/user">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>User</span>
                    </a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="/email">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Email</span>
                    </a>
                </li>

            </ul>
            <!-- End of Sidebar -->

            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="{{ route('profileAdmin.edit', Auth::user()->id) }}">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <section class="content">

                        @yield('content')

                    </section>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

            </div>

        </div>
    </header>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; SIMUDAH 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->



</body>

</html>
