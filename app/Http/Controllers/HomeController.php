<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\FoodChefs;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //first home section
    public function index(){
       $food = Food::all();
       if(Auth::id()){
        if(Auth::user()->user_type=='admin'){
          $chefs=FoodChefs::all();
          $user_id=Auth::id();
          $count=Cart::where('user_id',$user_id)->count();
          return view('home',['foods'=>$food,'chefs'=>$chefs,'count'=>$count,'user_id'=>$user_id]);
        }else {
          return redirect('/redirect');
        }
        
       }
       $chef= FoodChefs::all();
       return view('home',['foods'=>$food,'chefs'=>$chef]);
    }
    //redirect when the user login in successfully
    public function redirect(){
        $food = Food::all();
        $chefs=FoodChefs::all();
        $user_id=Auth::user()->id;
        $user_type= Auth::user()->user_type;
        $id=Auth::id();
        $count= Cart::where('user_id',$id)->count();
        if($user_type=='admin'){
          return view('admin.admin');
        }
        else {
            return view('home',['foods'=>$food,'chefs'=>$chefs,'count'=>$count,'user_id'=>$user_id]);
        }
    }
     //add Cart
     public function addCart(Request $request,$id){
       if(Auth::id()){
        $data=new Cart;
        $data->quantity=$request->quantity;
        $data->user_id=Auth::id();
        $data->food_id=$id;
        $data->save();
        return redirect()->back();
       }
       else{
        return redirect('/login');
       }
    }
    //view cart
    public function viewCart(){
      if(Auth::id()){
        $user_id=Auth::user()->id;
        $cart=Cart::where('user_id',$user_id)->get();
        return view('viewcart',['userid'=>$user_id,'carts'=>$cart]);
      }
      else {
        return redirect('/login');
      }
    }
    //delete Cart
    public function deleteCart($id){
      $deletecart=Cart::find($id);
      $deletecart->delete();
      return redirect()->back();
    }

    //add order
    public function addOrder(Request $request){
      foreach($request->foodname as $key=>$foodname){
        $data=new Order;
         $data->name=$request->name;
         $data->foodname=$foodname;
         $data->price=$request->price[$key];
         $data->quantity=$request->quantity[$key];
         $data->phonenumber=$request->phone;
         $data->address=$request->address;
         $data->save();
         
      }
       return redirect()->back();
    }
  }


  