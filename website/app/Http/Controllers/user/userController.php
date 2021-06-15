<?php
namespace App\Http\Controllers\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\orderRequest; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Product;
use App\Category; 
use App\sale;
use App\User;
use App\Address;
use Session; 

class userController extends Controller
{ 
    public function index()
    {
    	$res = Product::all();
        $cat = Category::all();
    	return view('store.index')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('index', 1);
    }
    public function view($id)
    {      
        $res = Product::find($id);
        $res1 = Product::all();
        $cat=Category::find($res->category_id);
    	$cat = Category::all();
        return view('store.product')
            ->with('product', $res)
            ->with('products', $res1)
            ->with('cat', $cat);
    }

    public function search(Request $r){
        $category ;
        $name ;
        if($r->query("c")){
            $category = $r->query("c");
        }
        if($r->query("n")){
            $name = $r->query("n");
        }
        $res = Product::all();
        $cat = Category::all();

        if(isset($category) && isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" ) );
        }
        else if(isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%'" ) );
        }
        else if(isset($category)){
            $sRes = DB::table('products')
            ->where("category_id" , $category)
            ->get();
        }
        else{
            $sRes = DB::table('products')
            ->get();
        }

        if(!isset($category)) {
            $category = -1;
        }
    	return view('store.search')
            ->with('products', $sRes)
            ->with("cat", $cat)
            ->with("a", $category);
    }

    public function post($id,orderRequest $r)
    {
        if(!(Session::has('cart')))
        {
            Session::put('orderCounter',1);
            $c=$id.":".Session::get('orderCounter');
            Session::put('cart',$c);
        }
        else
        {
            Session::put('orderCounter',Session::get('orderCounter')+1);
            $cd=$id.":".Session::get('orderCounter');
            $total=Session::get('cart').",".$cd;
            Session::put('cart',$total);
        }
        return redirect()->route('user.home');
    }

    public function cart(Request $r)
    { 
        $res = Product::all();
        $cat = Category::all();
        if(!Session::has('cart'))
        {
            return view('store.cart')->with('all',null)
            ->with('products',[])
            ->with('products', $res)
            ->with("cat", $cat);
        }
        $cart=[];
        $product=[];
        $cost=0;
        $totalCart = explode(',',Session::get('cart'));
        foreach($totalCart as $c)
        {
            $cart[]=explode(':',$c);
            $a=explode(':',$c);
            $res = Product::find($a[0]);
            $product[]=$res;
            $cost=$res->price;
            Session::put('price',$cost);
        }

    	return view('store.cart')
            ->with('products', $res)
            ->with("cat", $cat)
            ->with('all',$cart)
            ->with('prod',$product)
            ->with('total',Session::get('price'));
    }
    
    public function editCart(Request $r)
    {    
        $newres = Product::all();
        $newcat = Category::all();
        $newcart=[];
        $newproduct=[];
        $newcost=0;
        $newtotalCart = explode(',',Session::get('cart'));
        foreach($newtotalCart as $c)
        {
            $newcart[]=explode(':',$c);
        }
        foreach($newcart as $t)
        {
                if($t[0]==$r->pid && $t[1]==$r->oSerial)
                {
                   $t[1]=$r->newQ;
                }
                if(!(Session::has('tempCart')))
                {

                    $str=$t[0].":".$t[1];
                    Session::put('tempCart',$str);
                }
                else
                {
                    $str2=$t[0].":".$t[1];
                    $mytotal=Session::get('tempCart').",".$str2;
                    Session::put('tempCart',$mytotal);
                }
                
        }
        Session::forget('cart');
        Session::put('cart',Session::get('tempCart'));
        Session::forget('tempCart');
        $res = Product::all();
        $cat = Category::all();
        $cart=[];
        $product=[];
        $cost=0;
        Session::forget('price');
        $totalCart = explode(',',Session::get('cart'));
        foreach($totalCart as $c)
        {
            $cart[]=explode(':',$c);
            $a=explode(':',$c);
            $res = Product::find($a[0]);
            $product[]=$res;
            $cost=$res->price;
            Session::put('price',$cost); 
        }
        $szn[0]=Session::get('cart');
        $szn[1]=Session::get('price');
        $szn[2]=$cost;
        return json_encode($szn);     
        exit; 
    }
    public function deleteCartItem(Request $r)
    {
        $counter=0;
        $newtotalCart = explode(',',Session::get('cart'));
        foreach($newtotalCart as $c)
        {
            $newcart[]=explode(':',$c);
        }
        foreach($newcart as $t)
        {   
                if($t[1]==$r->serial)
                {
                    $another_counter=$counter;
                }
                $counter++;
        } 
        array_splice($newtotalCart, $another_counter, 1);
        foreach($newtotalCart as $c2)
        {
             
            $newcart2[]=explode(':',$c2);
        }
        if($newtotalCart==null)
        {
            Session::forget('cart');
            Session::forget('price');
            Session::forget('orderCounter');
            return json_encode("Empty");
            exit;     
            
        }
        else
        {
            foreach($newcart2 as $t2)
        {
               
                if(!(Session::has('tempCart')))
                {
                    $str2=$t2[0].":".$t2[1];
                    Session::put('tempCart',$str2);
                }
                else
                {
                    $str2=$t2[0].":".$t2[1];
                    $mytotal2=Session::get('tempCart').",".$str2;
                    Session::put('tempCart',$mytotal2);
                }  
        }
            Session::forget('cart');
            Session::put('cart',Session::get('tempCart'));
            Session::forget('tempCart');
            $res = Product::all();
            $cat = Category::all();
            $cart=[];
            $product=[];
            $cost=0;
            Session::forget('price');
            $totalCart = explode(',',Session::get('cart'));
            foreach($totalCart as $c)
            {
                $cart[]=explode(':',$c);
                $a=explode(':',$c);
                $res = Product::find($a[0]);
                $product[]=$res;
                $cost=$res->price;
                Session::put('price',$cost);
            }
            $szn[0]=Session::get('cart');
            $szn[1]=Session::get('price');
            $szn[2]=$cost;
            $szn[3]=$r->serial;
            return json_encode($szn);
            exit; 
        }
    }
}
