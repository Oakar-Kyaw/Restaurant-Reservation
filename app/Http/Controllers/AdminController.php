<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodChefs;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //list of users
    public function users(){
        $users= User::all();
        return view('admin.user',['users'=>$users]);
    }
    //delete user using id
    public function delete($id){
          $delete_user= User::find($id);
          $delete_user->delete();
          return back();
    }

    //delete food using id 
    public function deletefood($id){
        $deletefood=Food::find($id);
        $deletefood->delete();
        return back();
    }
    public function food(){
        $food=Food::all();
        return view('admin.foodmenu',['foods'=>$food]);
    }
    //uploading food with admin board
    public function uploadfood(Request $request){
        $data=new Food;
        $data->title=$request->title;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodmenu',$imagename);
        $data->image=$imagename;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }

    //view update food
    public function viewupdatefood($id){
        $updatefood= Food::find($id);
        
        return view('admin.updatefood',['updatefoods'=>$updatefood]);
    }
    //updating food with admin board
    public function updatefood(Request $request,$id){
        $data=Food::find($id);
        $data->title=$request->title;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodmenu',$imagename);
        $data->image=$imagename;
        $data->price=$request->price;
        $data->description=$request->description;
        $data->save();
        return redirect()->back();
    }
    //view reservation
    public function reservationAll(){
        $reservation= Reservation::all();
        return view('admin.reservation',['reservations'=>$reservation]);
    }

    //uploading reservation
    public function uploadReservation(Request $request){
    
        $data=new Reservation;
        $data->name=$request->name;
        $data->phonenumber=$request->phone;
        $data->email=$request->email;
        $data->time=$request->time;
        $data->numberofguest=$request->number_of_guests;
        $data->date=$request->date;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();
    }
    
    //view chefs
    public function viewChefs(){
        $chef=FoodChefs::all();
        return view('admin.chefs',['chefs'=>$chef]);
    }

    //upload chefs
    public function uploadChefs(Request $request){
         $data=new FoodChefs;
         $data->name=$request->name;
         $data->speciality=$request->speciality;
         $image=$request->image;
         $imagename=time().'.'.$image->getClientOriginalExtension();
         $request->image->move('foodchefs',$imagename);
         $data->image=$imagename;
         $data->save();
         return redirect()->back();
    }
    //view update Chefs
    public function viewUpdateChefs($id){
        $updatechef=FoodChefs::find($id);
        return view('admin.updatechef',['updatechef'=>$updatechef]);
   }
     //update Chefs
     public function updateChef(Request $request, $id){
        $updatechef=FoodChefs::find($id);
        $updatechef->name=$request->name;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodchefs',$imagename);
        $updatechef->image=$imagename;
        $updatechef->speciality=$request->speciality;
        $updatechef->save();
        return redirect()->back();
   }
    //delete Chefs
    public function deleteChefs($id){
        $chef=FoodChefs::find($id);
        $chef->delete();
        return redirect()->back();
    }

   //view all order 
   public function viewAllOrder(){
    $data=Order::all();
    return view('admin.order',['orders'=>$data]);
   }

   //search
   public function search(Request $request){
    $order=Order::where('name','LIKE',"%".$request->search.'%')->orWhere('foodname','LIKE',"%".$request->search.'%')->get();
    return view('admin.order',['orders'=>$order]);
   }




}
