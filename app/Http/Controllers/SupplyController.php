<?php

namespace App\Http\Controllers;

use App\Supply;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\DB;
class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('admin.supply.create',['users'=>$users, 'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd(request()->all());
         $supplies = Supply::where('date', '=', $request->get('date'))
                            ->where('slot', '=', $request->get('slot'))
                            ->where('user_id', '=', $request->get('user_id'))
                            ->first();
         if($supplies === null){
            $supplies = request()->validate([
                'user_id'=>'',
                'product_id'=>'',
                'date'=>'',
                'slot'=>'',
                'quantity'=>'',
                'created_by'=>''
            ]);


            Supply ::create([
                'user_id'=> $supplies['user_id'],
                'product_id'=> $supplies['product_id'],
                'date'=> $supplies['date'],
                'slot'=> $supplies['slot'],
                'quantity'=> $supplies['quantity'],
                'created_by'=> auth()->user()->name
            ]);

        }



        request()->session()->flash('message', 'Supply is created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply,User $users, $id)
    {
        $users = User::all();
        $products = Product::all();
        $supply = Supply::find($id);
        return view('admin.supply.edit',['supplies'=>$supply, 'users'=>$users, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supply  $supplies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supplies, $id)
    {
        $inputs = request()->validate([
            'id'=>'',
            'user_id'=>'',
            'product_id'=>'',
            'date'=>'',
            'slot'=>'',
            'quantity'=>'',
            'created_by'=>''
        ]);

        $supplies =  Supply::find($id);
        $supplies->id = $inputs['id'];
        $supplies->user_id = $inputs['user_id'];
        $supplies->product_id = $inputs['product_id'];
        $supplies->date = $inputs['date'];
        $supplies->slot = $inputs['slot'];
        $supplies->quantity = $inputs['quantity'];
        $supplies->created_by = $inputs['created_by'];

       // dd($inputs);
        $supplies->update();

        return redirect()->route('admin.read',['supplies'=>$supplies]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supply  $supplies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supplies, $id)
    {
        $supplies = Supply::find($id);
        $supplies->delete();
        request()->session()->flash('message', 'Supply was deleted');
        return back();
    }

    public function read(Supply $supplies){
        $users = User::all();
        $products = Product::all();
        $supplies = Supply::select('supplies.*', 'users.name',  'products.name as product_name')
                    ->join('users', 'users.id', '=', 'supplies.user_id')
                    ->join('products', 'products.id', '=', 'supplies.product_id')
                    ->get();
        // foreach($supplies as $supply){
        //     dd($supply); die;
        // }
        return view('admin.supply.read', ['supplies'=>$supplies,'users'=>$users, 'products'=>$products]);
    }

    public function deleteSupply(Request $request, Supply $supplies){

        $supplies = Supply::findOrFail($request->checkBoxArray);

        foreach($supplies as $supply){
            $supply->delete();
        }
       // dd($supply);
        return view('admin.supply.read',['supplies'=>$supplies]);
    }

    public function slotMorning(Supply $supplies){
        $users = User::all();
        $products = Product::all();
        // $supplies = Supply::where('slot','Morning')->get();
        $supplies = Supply::select('supplies.*', 'users.name',  'products.name as product_name')
        ->where('slot','Morning')
        ->join('users', 'users.id', '=', 'supplies.user_id')
        ->join('products', 'products.id', '=', 'supplies.product_id')
        ->get();
        return view('admin.supply.morning',['supplies'=>$supplies,'users'=>$users, 'products'=>$products]);

    }

    public function slotEvening(Supply $supplies){
        $users = User::all();
        $products = Product::all();
        // $supplies = Supply::where('slot','Evening')->get();
        $supplies = Supply::select('supplies.*', 'users.name',  'products.name as product_name')
        ->where('slot','Evening')
        ->join('users', 'users.id', '=', 'supplies.user_id')
        ->join('products', 'products.id', '=', 'supplies.product_id')
        ->get();
        return view('admin.supply.evening',['supplies'=>$supplies,'users'=>$users, 'products'=>$products]);

    }

    public function updateMorningSupply(Request $request, Supply $supplies){

        $supplies = Supply::findOrFail($request->checkBoxArray);

        foreach($supplies as $supply){
            $supply->update();
        }
       // dd($supply);
        return view('admin.supply.read',['supplies'=>$supplies]);
    }

    public function updateEveningSupply(Request $request){

       // dd($request->all); die();


        $inputs = request()->validate([
            'id'=>'',
            'user_id'=>'',
            'product_id'=>'',
            'date'=>'',
            'slot'=>'',
            'quantity'=>''
        ]);

        $supplies = Supply::findOrFail($request->checkBoxArray);
        $supplies->id = $inputs['id'];
        $supplies->user_id = $inputs['user_id'];
        $supplies->product_id = $inputs['product_id'];
        $supplies->date = $inputs['date'];
        $supplies->slot = $inputs['slot'];
        $supplies->quantity = $inputs['quantity'];

        foreach($supplies as $supply){

            $supply->update();
        }
       // dd($supply);
        return view('admin.supply.read',['supplies'=>$supplies]);
    }
}
