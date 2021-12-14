<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodchef;
use App\Models\Order;

class AdminController extends Controller
{
    //
    public function user()
    {
        $data = User::all();
        return view("admin.users",compact('data'));
    }

    public function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu()
    {
        $data = food::all();
        return view("admin.foodmenu",compact('data'));
    }

    public function upload(Request $req)
    {
        $data = new food;
        
        $image = $req->image;

        // time() gives unique name & getClientOriginalExtension() gives images extension
        $imagename = time().'.'.$image->getClientOriginalExtension();
        // to move image in public folder in foodimage folder
        $req->image->move('foodimage',$imagename);

        $data->images = $imagename;
        $data->title = $req->title;
        $data->price = $req->price;
        $data->description = $req->description;
        $data->save();

        return redirect()->back();
    }

    public function deletemenu($id)
    {
        //food::destroy($id); 1st way to delete data from database

        $data = food::find($id);// 2nd way to delete data from database
        $data->delete();

        return redirect()->back();
    }

    public function updateview($id)
    {
        $data = food::find($id);
        return view('admin.updateview',compact('data'));
    }

    public function update(Request $req, $id)
    {
        $data = food::find($id);
        
        $image = $req->image;

        // time() gives unique name & getClientOriginalExtension() gives images extension
        $imagename = time().'.'.$image->getClientOriginalExtension();
        // to move image in public folder in foodimage folder
        $req->image->move('foodimage',$imagename);

        $data->images = $imagename;
        $data->title = $req->title;
        $data->price = $req->price;
        $data->description = $req->description;
        $data->save();

        return redirect()->back();
    }

    public function reservation(Request $req)
    {
        $data = new Reservation;

        $data->name = $req->name;
        $data->email = $req->email;
        $data->phone = $req->phone;
        $data->guest = $req->guest;
        $data->date = $req->date;
        $data->time = $req->time;
        $data->message = $req->message;
        $data->save();

        return redirect()->back();
    }

    public function viewreservation()
    {
        if(Auth::id())
        {
            $data = Reservation::all();
            return view('admin.adminreservation',compact('data'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function viewchef()
    {
        $data = Foodchef::all();
        return view('admin.adminchef',compact('data'));
    }

    public function uploadchef(Request $req)
    {
        $data = new Foodchef;
        
        $image = $req->image;

        // time() gives unique name & getClientOriginalExtension() gives images extension
        $imagename = time().'.'.$image->getClientOriginalExtension();
        // to move image in public folder in foodimage folder
        $req->image->move('chefimage',$imagename);

        $data->name = $req->name;
        $data->speciality = $req->speciality;
        $data->image = $imagename;

        $data->save();

        return redirect()->back();
    }

    public function updatechef($id)
    {
        $data = Foodchef::find($id);
        return view('admin.updatechef',compact('data'));
    }

    public function updatefoodchef(Request $req, $id)
    {
        $data = Foodchef::find($id);
        
        $image = $req->image;

        if($image)
        {
            // time() gives unique name & getClientOriginalExtension() gives images extension
            $imagename = time().'.'.$image->getClientOriginalExtension();
            // to move image in public folder in foodimage folder
            $req->image->move('chefimage',$imagename);

            $data->image = $imagename;
        }

        $data->name = $req->name;
        $data->speciality = $req->speciality;
        

        $data->save();

        return redirect()->back();
    }

    public function deletechef($id)
    {
        $data = Foodchef::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function orders()
    {
        $data = order::all();
        return view('admin.orders',compact('data'));
    }

    public function search(Request $req)
    {
        $search = $req->search;
        $data = order::where('name','Like','%'.$search.'%')
        ->orWhere('foodname','Like','%'.$search.'%')
        ->get();
        return view('admin.orders',compact('data'));
    }
}
