<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirects');
        }
        else
        $data = Food::all();
        $data2 = Foodchef::all();
        return view('home',compact('data','data2'));
    }

    public function redirects()
    {
        $data = Food::all();
        $data2 = Foodchef::all();

        $usertype = Auth::user()->usertype;
        if($usertype == '1')
        {
            return view('Admin.adminhome');
        }
        else
        {
            $user_id = Auth::id();
            $count = cart::where('user_id',$user_id)->count();

            return view('home',compact('data','data2','count'));
        }
    }

    public function addcart(Request $req, $id)
    {
        if(Auth::id())
        {
            $cart = new cart;

            $cart->user_id = Auth::id();
            $cart->food_id = $id;
            $cart->quantity = $req->quantity;
            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    public function showcart(Request $req, $id)
    {
        $count = cart::where('user_id',$id)->count();

        if(Auth::id() == $id)
        {
            $data = cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();

            $data2 = cart::select('*')->where('user_id',$id)->get();

            return view('showcart',compact('count','data','data2'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function remove($id)
    {
        $data = cart::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orderconfirm(Request $req)
    {
        foreach($req->foodname as $key=>$foodname)
        {
            $data = new order;
            $data->foodname = $foodname;
            $data->quantity = $req->quantity[$key];
            $data->price = $req->price[$key];
            $data->name = $req->name;
            $data->phone = $req->phone;
            $data->address = $req->address;
            $data->save();
        }
        return redirect()->back();
    }

    
}
