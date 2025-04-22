<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset="utf-8" />
    <title>Vibrancy Path</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" /> --}}
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/vibrancy-logo.png') }}">

    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <link href="{{ asset('assets/css/custom.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/src/parsley.css">
</head>


<body data-topbar="dark" data-layout="horizontal">

    <!-- Begin page -->
    <div id="layout-wrapper">
            @include('layouts.customer.navbar')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')
                    <!-- end row -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

    @include('layouts.customer.footer')
 <!-- Footer -->
 <footer class="footer py-5">
        <div class="container  mt-5">
            <div class="row gy-4">
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4>Vibrancy Path</h4>
                    <p>Live Your Soul's Purpose With Passion and Power.</p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4>Quick Link</h4>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-arrow-right-long"></i></i><a href="#about">About</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#coaching">Coaching</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#courses">Courses</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#store">Store</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#privacy-policy">Privacy Policy</a>
                        </li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#terms&conditions">Terms &
                                Conditions</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4>Products</h4>
                    <ul class="list-unstyled">
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#">Charts</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#">eBooks</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#">Vibrancy Essences</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i><a href="#">Webinars</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <h4>Have a question?</h4>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt" title="Address"></i> The Vibrancy Path 250
                            Lakeland Lane, Faber, VA 22938</li>
                        <li><i class="fas fa-phone" title="Phone"></i> +434-361-2042</li>
                        <li><i class="fas fa-envelope" title="Email"></i> info@thevibrancypath.com<br>
                            support@thevibrancypath.com
                        </li>
                    </ul>
                </div>
            </div>
            <div class="copyright mt-3 text-center">
                <p>Copyright ©2024 All rights reserved | Design & Develop
                    <i class="ri-heart-line"></i> By
                    <a href="sanpurple">Sanpurple Inc.</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/parsleyjs@2.9.2/dist/parsley.min.js"></script>



</body>

</html>




