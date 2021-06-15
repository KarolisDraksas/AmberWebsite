<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\sale; 
use App\User;
use App\Address;


class signupController extends Controller
{
    public function userIndex()
    {
        if(session()->has('user')){
            return redirect()->route("user.cart");
        }
        $res = Product::all();
        $cat = Category::all();
    	return view('store.signup')
        ->with('products', $res)
        ->with("cat", $cat);
    }
    
    public function userPosted(Request $r)
    {
            $validatedData = $r->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'address' => 'required',
            'tel' => 'required|numeric',
            'pass' => 'required|min:5',
            'confirm_password' => 'required|min:5|same:pass'
            ]);

            $u=new User();
            $u->full_name=$r->name;
            $u->email=$r->email;
            $u->password=$r->pass;
            $u->address=$r->address;
            $u->phone=$r->tel;
            $u->save();
            $user=User::find($u->id);
            $r->session()->put('user',$user);
            return redirect()->route('user.home');
    }
    
    public function emailCheck(Request $r)
    {
       $user = User::where('email',$r->email)
        ->first();
        if($user==null)
        {
             $emailstate = 0;
        }
        else
        {
            $emailstate = 1;
        }  
         echo json_encode($emailstate);
    exit;
    }
    
    
}
