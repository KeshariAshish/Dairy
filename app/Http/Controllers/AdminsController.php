<?php

namespace App\Http\Controllers;
use App\User;
use App\Production;
use App\Invoice;
use App\Supply;
use App\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class AdminsController extends Controller
{
    public function index(User $users, Production $productions, Invoice $invoices, Supply $supplies, Product $products){
        if(auth()->user()->is_Admin==1){
        $productions = Production::select('productions.*')->where('date', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString());

        $invoices = Invoice::all();
        return view('admin.index',['productions'=>$productions,'invoices'=>$invoices]);
        }else{
            $productions = Production::select('production.*');
            $invoices = Invoice::all();
            $supplies = Supply::select('supplies*')->where('user_id', '=', auth()->user()->id)->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString());
            $users = User::all();
            $invoices = Invoice::select('invoices.*')->where('user_id', '=', auth()->user()->id)->select('price')->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth()->toDateString())->select('due_amount');
            return view('admin.index',['productions'=>$productions,'invoices'=>$invoices,'users'=>$users, 'supplies'=>$supplies, 'products'=>$products]);
        }

    }

    public function create(){
        return view('admin.create');
    }

    public function store(User $inputs, Request $request){

      $inputs = request()->validate([
           'name'=>'required|min:6',
           'email'=>'required',
           'password' => 'required',
           'home_number'=>'required',
           'address'=>'required',
           'locality'=>'required',
           'city'=>'required',
           'zip_code'=>'required',
           'location'=>'required',
           'is_active'=>'',
           'phone'=>'required',
           //'created_by'=>'required',
           'is_Admin'=>''
       ]);

        User::create([
        'name' => $inputs['name'],
        'email' => $inputs['email'],
        'password' => Hash::make($inputs['password']),
        'home_number' => $inputs['home_number'],
        'address' => $inputs['address'],
        'locality' => $inputs['locality'],
        'city' => $inputs['city'],
        'zip_code' => $inputs['zip_code'],
        'location' => $inputs['location'],
        'is_active' => $inputs['is_active'],
        'phone' => $inputs['phone'],
        //'created_by' => $inputs['created_by'],
        'is_Admin' => $inputs['is_Admin']
         ]);



            return redirect()->route('admin.read');
    }

    public function read(User $users){
        $users = User::all();
        return view('admin.read', ['users'=>$users]);
    }

    public function edit(Request $request, $id){
        $user = User::find($id);
      //  dd($user);

        return view('admin.edit', ['user'=>$user]);

    }

    public function update(Request $request, $id){


        $inputs = request()->validate([
            'name'=>'required|min:6|max:12',
            'email'=>'required',
            'home_number'=>'required',
            'address'=>'required',
            'locality'=>'required',
            'city'=>'required',
            'zip_code'=>'required|min:6',
            'location'=>'required',
            'created_by'=>'required',
            'phone'=>'required'

        ]);

        $user =  User::find($id);
        // $users->name = request('name');
        // $users->email = request('email');
        $user->name = $inputs['name'];
        $user->email = $inputs['email'];
        $user->home_number = $inputs['home_number'];
        $user->address = $inputs['address'];
        $user->locality = $inputs['locality'];
        $user->city = $inputs['city'];
        $user->zip_code = $inputs['zip_code'];
        $user->location = $inputs['location'];
        $user->created_by = $inputs['created_by'];
        $user->phone = $inputs['phone'];

       //dd($inputs);
        $user->update();

        return redirect()->route('admin.read');
    }


    public function destroy(Request $request, $id){
        $user = User::find($id);
        $user->delete();
        request()->session()->flash('message', 'User was deleted');
        return back();
    }

    public function deleteUsers(Request $request, User $users){

        $users = User::findOrFail($request->checkBoxArray);

        foreach($users as $user){
            $user->delete();
        }
       // dd($supply);
        return view('admin.read',['users'=>$users]);
    }
}
