<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('admin.product.create',['users'=> $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd(request()->all());
        $data = request()->validate([
            'name'=>'required',
            'price'=>'required',
            'unit'=>'required',
            'user_id'=>'',
        ]);
        $users = User::all();
        // Product::create([
        //     'name'=> $request['name'],
        //     'price'=> $request['price'],
        //     'unit'=> $request['unit']
        // ]);
        $products = new Product;
        $products->name = $data['name'];
        $products->price = $data['price'];
        $products->unit = $data['unit'];
        $products->user_id = $data['user_id'];

        $products->save();
        request()->session()->flash('message', 'Product was created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $users = User::all();
        $product = Product::find($id);
        return view('admin.product.edit',['product'=>$product, 'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $inputs = request()->validate([
            'name'=>'required|min:6|max:12',
            'price'=>'required',
            'unit'=>'required',
            'is_active'=>'',
            'user_id'=>''
        ]);

        $product =  Product::find($id);
        $product->name = $inputs['name'];
        $product->price = $inputs['price'];
        $product->unit = $inputs['unit'];
        $product->is_active = $inputs['is_active'];
        $product->user_id = $inputs['user_id'];

        //dd($inputs);
       $product->update();
       request()->session()->flash('message', 'Product was updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $products,$id)
    {
        $products = Product::find($id);
        $products->delete();
        request()->session()->flash('message', 'Product was deleted');
        return back();
    }

    public function read(Product $products){
        $products = Product::select('products.*', 'products.name', 'users.name as user_name')
                    ->join('users', 'users.id', '=', 'products.user_id')
                    ->get();
        return view('admin.product.read',['products'=>$products]);
    }

    public function deleteProduct(Request $request, Product $products){

        $products = Product::findOrFail($request->checkBoxArray);

        foreach($products as $product){
            $product->delete();
        }
       // dd($supply);
        return view('admin.product.read',['products'=>$products]);
    }
}
