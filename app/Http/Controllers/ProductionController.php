<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Production;
use App\Product;
use App\User;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Production $productions)
    {
        $products = Product::all();
        $productions = Production::select('productions.*','products.name as product_name' )
        ->join('products', 'products.id', '=', 'productions.product_id')
        ->get();
        return view('admin.production.read',['productions'=> $productions, 'products'=> $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productions = Production::all();
        $products = Product::all();
        return view('admin.production.create',['products'=> $products, 'productions'=> $productions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Production $productions,Request $request)
    {
        $productions = Production::where('slot', '=', $request->get('slot'))->where('date', '=', $request->get('date'))->first();
        if($productions === null){
            $request = request()->validate([
                'product_id'=>'required',
                'slot'=>'required',
                'quantity'=>'required',
                'available_quantity'=>'required',
                'comment'=>'required',
                'created_by'=>'',
                'updated_by'=>'',
                'date'=>'required'
            ]);


            Production::create([
                'product_id'=>          $request['product_id'],
                'slot'=>                $request['slot'],
                'quantity'=>            $request['quantity'],
                'available_quantity'=>  $request['available_quantity'],
                'comment'=>             $request['comment'],
                'created_by'=>          auth()->user()->id,
                'updated_by'=>          auth()->user()->id,
                'date'=>                $request['date']
            ]);
            }

            request()->session()->flash('message', 'Production is created successfully');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $production = Production::find($id);
        return view('admin.production.edit',['production'=> $production, 'products'=> $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Product $products)
    {
        $productions = Production::where('slot', '=', $request->get('slot'))->where('date', '=', $request->get('date'))->first();
        if($productions === null){
        $inputs = request()->validate([
            'slot'=>'',
            'quantity'=>'',
            'available_quantity'=>'',
            'updated_by'=>'',
            'date'=> ''
            // 'is_active'=>'',
            // 'user_id'=>''
        ]);

        $products = Product::all();
        $productions =  Production::find($id);
        $productions->slot = $inputs['slot'];
        $productions->quantity = $inputs['quantity'];
        $productions->available_quantity = $inputs['available_quantity'];
        $productions->date = $inputs['date'];
        $productions->updated_by = auth()->user()->id;

       // dd($inputs);
        $productions->update();
        }

        // return view('admin.index',['productions'=>$productions, 'products'=>$products]);
        request()->session()->flash('message', 'Production was updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productions = Production::find($id);
        $productions->delete();
        request()->session()->flash('message', 'Production was deleted');
        return back();

    }

    public function currentMonthProduction(){
        $productions = Production::all();
        $users = User::all();
        DB::table('productions')->get()->sum('quantity')->where('user_id', '=', '');
        return view('admin.index',['productions'=>$productions, 'users'=>$users]);
    }
}
