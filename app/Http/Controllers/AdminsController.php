<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function create(){
        return view('admin.create');
    }

    public function store(){

      $inputs = request()->validate([
           'name'=>'required',
           'email'=>'required',
           'password'=>'required'
        //    'home_number'=>'required',
        //    'address'=>'required',
        //    'locality'=>'required',
        //    'city'=>'required',
        //    'zip_code'=>'required',
        //    'location'=>'required',
        //    'is_active'=>'required',
        //    'phone'=>'required',
        //    'created_by'=>'required',
        //    'is_admin'=>'required'
       ]);

      auth()->user()->create($inputs);
      return back();
      
    }

    public function read(){
        $users = User::all();
        return view('admin.read', ['users'=>$users]);
    }

    public function destroy(User $users, Request $request){
        $users->delete();
        request()->session()->flash('message', 'User was deleted');
        return back();
    }
}
