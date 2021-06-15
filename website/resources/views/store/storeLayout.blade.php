<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Amber website</title>


    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">


    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />

    <link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}" />


    <link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}" />


    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

    <link type="text/css" rel="stylesheet" href="{{asset('css/style2.css')}}" />

</head>

<body>
    <header>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="">
                            <a href="{{route('user.home')}}">
                               <h2 class="header-name">Amber website</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7 clearfix">
                        <div class="header-ctn">
                            <div  class="dropdown">
                                <a class="dropdown-toggle " id="custom_shopping_cart" href="{{route('user.cart')}}">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                </a>

                            </div>
                        </div>
                    </div>
                    <div>
                    <ul class="header-links pull-right">
                    @if(session()->has('user'))
                      <li><a style="color:white" >{{session()->get('user')->full_name}} </a></li>  
                      <li><a href="{{route('user.logout')}}"><i class=""></i> Logout</a></li>
                    @else
                    <li><a href="{{route('user.login')}}"><i class=""></i> Login</a></li>
                    
                    <li><a href="{{route('user.signup')}}"><i class=""></i> SignUp</a></li>
                    @endif
                    
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav id="navigation">
        <div class="container">
            <div id="responsive-nav">
                <ul class="main-nav nav navbar-nav">
                    <li class="{{Route::is('user.home') ? 'active' : ''}}"><a href="{{route('user.home')}}">Home</a></li>
                    @if(Route::is('user.search'))
                        @foreach($cat as $c)
                        <li class="{{$c->id == $a ? 'active' : ''}}"><a href="{{route('user.search.cat',['id'=>$c->id])}}" >{{$c->name}}</a></li>
                        @endforeach
                        <li class="{{$a == -1  ? 'active' : ''}}"><a href="search">Browse All</a></li>
                    @else
                        @foreach($cat as $c)
                        <li ><a href="{{route('user.search.cat',['id'=>$c->id])}}" >{{$c->name}}</a></li>
                        @endforeach
                        <li ><a href="{{route('user.search')}}">Browse All</a></li>
                    @endif                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="section">
        <div class="container">
            @if(Route::is('user.home'))
            <div class="row">
                @php
                $counter=0;
                @endphp
                @foreach($cat as $c)
                 @php
                $counter++;
                if($counter==4)
                break;
               
                @endphp
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-body">
                            <h3>{{$c->name}}</h3>
                            <a href="search?c={{$c->id}}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>


    @yield('content')

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/nouislider.min.js')}}"></script>
    <script src="{{asset('js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
    
    

</body>

</html>
