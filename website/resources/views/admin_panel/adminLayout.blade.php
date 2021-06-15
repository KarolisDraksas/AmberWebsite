<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admim</title>

    <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{asset('favicon.png')}}" />
</head>

<body>
    <div class="container-scroller" style="color = black;">
        <nav class="navbar navbar-dark col-lg-12 col-12 p-0 d-flex flex-row" style="color = black;">
            <div class="navbar-menu-wrapper d-flex  align-items-center" style="color = black;">
                    <a class="nav-link" href="{{route('admin.products')}}">
                            <span>Products</span>
                    </a>
                    <a class="nav-link" href="{{route('admin.categories')}}">
                            <span>Categories</span>
                    </a>
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
    </div>
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
</body>

</html>
