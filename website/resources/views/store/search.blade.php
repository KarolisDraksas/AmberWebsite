@extends('store.storeLayout')
@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div id="store" class="col-md-12">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="uploads/products/{{$product->id}}/{{$product->image_name}}" alt="">                    
                            </div>
                            <div class="product-body">
                                <h3 class="product-name"><a href="product/{{$product->id}}">{{$product->name}}</a></h3>
                                <h4 class="product-price">{{$product->price}} Eur</h4>
                            </div>
                         
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection
