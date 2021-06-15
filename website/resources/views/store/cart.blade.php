@extends('store.storeLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>

<link type="text/css" rel="stylesheet" href="{{asset('css/style_for_quantity.css')}}" />
<style>
label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}
    .rTable {
        
    display: block;
    width:100%;
    
}
.rTableHeading, .rTableBody, .rTableFoot, .rTableRow{
    clear: both;
}
.rTableHead, .rTableFoot{
    background-color: #DDD;
    font-weight: bold;
}
.rTableCell, .rTableHead {
    
    float: left;
    overflow: hidden;
    padding: 3px 1.8%;
    width:33%; 
    
}
.rTable:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}
</style>             


<div class="section">
    <div class="container">
            <div class="col-md-5 order-details" style="width: 100%;">
                <div class="section-title text-center">
                    <h3 class="title">Your Cart</h3>
                </div>
                <div id="order_summary" class="order-summary">                  
                    @if($all != null)
                    <div class="rTable">
                        <div class="rTableRow">
                            <div class="rTableHead"><strong>REMOVE</strong></div>
                            <div class="rTableHead"><strong>PRODUCT</strong></div>
                            <div class="rTableHead"><strong>PRICE</strong></div>
                        </div>
					@foreach($all as $c)
					@foreach($prod as $p)
					@if($c[0]==$p->id)
                        <div  class="rTableRow" id="deleteItem_{{$c[1]}}">                         
                          <div class="rTableCell">  <button type="button" id="delete_item" href="{{route('user.deleteCartItem')}}" value={{$c[1]}} name="delete_item"  class="delete_item">X</button></div>
							<div class="rTableCell"><img src="uploads/products/{{$p->id}}/{{$p->image_name}}" height="50px" width="50px"> {{$p->name}}</div>                          							
							<div class="rTableCell"><div id="individualPrice_{{$c[1]}}">
                                @php
                                $tot =$p->price;
                                echo $tot;
                                @endphp
                                
                                Eur</div></div>
                                
						</div>
                        
						@break
					@endif
					@endforeach 
					@endforeach 
                    
                    </div>
                    <div class="order-col">
                        <div><strong>TOTAL</strong></div>
                        <div ><strong class="order-total" id="totalCost">{{Session::get('price')}} Eur</strong></div>
                    </div>
                    @else
                    <div class="order-col">
                        <h1>Your Cart is Empty</h1>
                    </div>
                    @endif              
                </div>
                @if(session('user'))
                    @if($all != null)
                   <center> <form method="post" name="cart">
                        {{csrf_field()}}
                        <input type="button" class="primary-btn order-submit" value="CONFIRM ORDER">
                    </form></center>
                    @endif
                    @else
                    @if(!session('user'))
                        {{csrf_field()}}        
            @endif                
                @endif      
        </div>
    </div>
</div>


<script>
    $('.delete_item').click(function () {
        var url="{{route('user.deleteCartItem')}}";
        var serial= $(this).val();   
        var token=$("input[name=_token]").val();
        var id_holder="deleteItem_"+serial;
        $.ajax({
                type:'post',
                url:url,
                dataType: "JSON",
                async: false,
                data:{serial:serial, _token: token},
                success:function(msg)
                {
                    if(msg=="Empty")
                        {
                        document.getElementById("order_summary").innerHTML = "<div class='order-col'><h1>Your Cart is Empty</h1></div>";
                        document.getElementById("confirm_order").style.visibility = "hidden";
                        }
                    document.getElementById(id_holder).innerHTML  = "";
                    document.getElementById("totalCost").innerHTML = msg[2];
                }
                });
    }); 
</script>
@endsection