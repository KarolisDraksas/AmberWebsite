@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link type="text/css" rel="stylesheet" href="{{asset('css/style_for_quantity.css')}}" />

<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}


</style>
<div class="section">
    <div class="container">
        <div class="row">
            <!--<div class="col-md-5 ">
                <div id="product-main-img">
                    <div class="product-preview">
                        @for ($i = 0; $i < 3; $i++)
                            <img src="../uploads/products/{{$product->id}}/{{strval($i)}}.jpg" alt="">
                        @endfor
   
                    </div>
                </div>
            </div>-->
            <div class="col-md-5 product-image">
            <div>
                <img src="../uploads/products/{{$product->id}}/0.{{$product->ext}}" width="100%" height="100%" id="current-image">
            </div>
            <div class="image-thumbnails">
            <img src="../uploads/products/{{$product->id}}/0.{{$product->ext}}" class="image-thumbnail active">
                @for ($i = 1; $i < $product->image_name ; $i++)
                    <img src="../uploads/products/{{$product->id}}/{{strval($i)}}.{{$product->ext}}" class="image-thumbnail">
                @endfor
            </div>
            </div>
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{$product->name}}</h2>
                    <div>
                    </div>
                    <div>
                        <h3 class="product-price">{{$product->price}} Eur</h3>
                    </div>
                    <p>{!!$product->description!!}</p>
                    <form method="post" id="order_form">
                    {{csrf_field()}}
                        <div id="for_error"></div>

                    <div class="add-to-cart">
                        <button type="submit" name="myButton" id="myButton" class="primary-btn order-submit"><i class="fa fa-shopping-cart"></i> add to cart</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height:200px"></div>

<script>
        $(document).ready(function () {
            // force the height to be as as long as the width
        
            var w = $('#current-image').width();

            $('#current-image').css({'height': w + 'px'});
            $('.image-thumbnail').on('click', (e) => {
                $('.image-thumbnail').removeClass('active');
                $(e.currentTarget).addClass('active');
                if($(e.currentTarget).attr('src') != $('#current-image').attr('src')) {
                    $(e.currentTarget).addClass('active');
                    $('#current-image').animate({'opacity' : 0}, 300, function() {
                        $('#current-image').attr('src', $(e.currentTarget).attr('src'));
                        $('#current-image').animate({'opacity' : 1}, 400);
                    })
                }
            });
        });
    </script>

@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            // force the height to be as as long as the width
            console.log(555);
            var w = $('#current-image').width();
            console.log(555);
            $('#current-image').css({'height': w + 'px'});
            $('.image-thumbnail').on('click', (e) => {
                $('.image-thumbnail').removeClass('active');
                $(e.currentTarget).addClass('active');
                if($(e.currentTarget).attr('src') != $('#current-image').attr('src')) {
                    $(e.currentTarget).addClass('active');
                    $('#current-image').animate({'opacity' : 0}, 300, function() {
                        $('#current-image').attr('src', $(e.currentTarget).attr('src'));
                        $('#current-image').animate({'opacity' : 1}, 400);
                    })
                }
            });
        });
    </script>

@endsection