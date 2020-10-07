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
        ->get();;
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
        $productions = Production::where('slot', '=', 'Morning')->first();
        if($productions === null){
            $productions = request()->validate([
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
                'product_id'=>          $productions['product_id'],
                'slot'=>                $productions['slot'],
                'quantity'=>            $productions['quantity'],
                'available_quantity'=>  $productions['available_quantity'],
                'comment'=>             $productions['comment'],
                'created_by'=>          auth()->user()->name,
                'updated_by'=>          auth()->user()->name,
                'date'=>                $productions['date']
            ]);
            }

            $productions = Production::where('slot', '=', 'Evening')->first();
            if($productions === null){
                $productions = request()->validate([
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
                    'product_id'=>          $productions['product_id'],
                    'slot'=>                $productions['slot'],
                    'quantity'=>            $productions['quantity'],
                    'available_quantity'=>  $productions['available_quantity'],
                    'comment'=>             $productions['comment'],
                    'created_by'=>          auth()->user()->name,
                    'updated_by'=>          auth()->user()->name,
                    'date'=>                $productions['date']
                ]);
            }
        return redirect()->route('production.read');
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
    public function update(Request $request, $id)
    {
        $inputs = request()->validate([
            'slot'=>'',
            'quantity'=>'',
            'available_quantity'=>'',
            'updated_by'=>''
            // 'is_active'=>'',
            // 'user_id'=>''
        ]);

        $products = Product::all();
        $productions =  Production::find($id);
        $productions->slot = $inputs['slot'];
        $productions->quantity = $inputs['quantity'];
        $productions->available_quantity = $inputs['available_quantity'];
        $productions->updated_by = auth()->user()->name;

       // dd($inputs);
        $productions->update();

        return view('admin.index',['productions'=>$productions, 'products'=>$products]);
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
}
