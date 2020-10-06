<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.stock.create',['products'=>$products]);
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
        $data = request()->validate([
            'date'=>'',
            'product_id'=>'',
            'total_quantity'=>''
        ]);

        
        $stock = new Stock;
        $stock->date = $data['date'];
        $stock->product_id = $data['product_id'];
        $stock->total_quantity = $data['total_quantity'];
       // $stock->available_quantity = $data['available_quantity'];
        
        $stock->save();

        return redirect()->route('admin.index')->withSuccess("You have created new stock");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock, $id)
    {
        $products = Product::all();
        $stock = Stock::find($id);
        return view('admin.stock.edit',['stocks'=>$stock, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stocks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stocks, $id)
    {
        $inputs = request()->validate([
            'id'=>'',
            'date'=>'',
            'product_id'=>'',
            'total_quantity'=>'',
            'available_quantity'=>''
        ]);

        $stocks =  Stock::find($id);
        $stocks->id = $inputs['id'];
        $stocks->date = $inputs['date'];
        $stocks->product_id = $inputs['product_id'];
        $stocks->total_quantity = $inputs['total_quantity'];
        $stocks->available_quantity = $inputs['available_quantity'];
       
        //dd($inputs);
        $stocks->update();
        
        return redirect()->route('admin.read');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stocks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stocks, $id)
    {
        $stocks = Stock::find($id);
        $stocks->delete();
        request()->session()->flash('message', 'Stock was deleted');
        return back();
    }

    public function read(Stock $stocks){
        $products = Product::all();
        $stocks = Stock::all();
        return view('admin.stock.read', ['stocks'=>$stocks, 'products'=>$products]);
    }

    public function deleteStock(Request $request, Stock $stocks){

        $stocks = Stock::findOrFail($request->checkBoxArray);

        foreach($stocks as $stock){
            $stock->delete();
        }
       // dd($supply);
        return view('admin.stock.read',['stocks'=>$stocks]);
    }
}
