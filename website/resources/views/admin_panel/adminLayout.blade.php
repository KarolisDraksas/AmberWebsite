<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admim</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" />
</head>

<body>
    <div class="container-scroller" style="color = black;">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar navbar-dark col-lg-12 col-12 p-0 d-flex flex-row" style="color = black;">
            <div class="navbar-menu-wrapper d-flex  align-items-center" style="color = black;">
                   
                   <!-- <a class="nav-link" style="color = black;" href="{{route('admin.dashboard')}}">
                            <span style="color = black;">Dashboard</span>
                    </a>-->
                    <a class="nav-link" href="{{route('admin.products')}}">
                            <span>Products</span>
                    </a>
                    <a class="nav-link" href="{{route('admin.categories')}}">
                            <span>Categories</span>
                        </a>
                       <!-- <a class="nav-link" href="{{route('admin.orderManagement')}}">
                            <span>Order Management</span>
                        </a>-->

                <!--<ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-xl-inline-block">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <span class="profile-text">{{session()->get('admin')->name}}</span>
                            <img class="img-xs rounded-circle" src="{{asset('images/faces/face1.jpg')}}" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <br>
                            <br>
                            <a class="dropdown-item" href="{{route('admin.logout')}}">
                                Sign Out
                            </a>
                        </div>

                    </li>
                </ul>-->
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-right" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
            <a class="nav-link" href="{{route('admin.logout')}}">
                    <span class="">Sign Out</span>
            </a>
        </nav>
        <div class="">
        @yield('content')
            </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->

    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>
    
    <!--    Jquery Validation-->
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
    <!-- End custom js for this page-->
</body>

</html>
