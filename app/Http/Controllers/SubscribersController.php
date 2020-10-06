<?php

namespace App\Http\Controllers;
use App\Product;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribersController extends Controller
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
    public function create(Request $request)
    {
    //    $data = DB::table('products')->select('id')->get();

    //    echo "<pre>";
    //    print_r($data);
        $users = User::all();
        $products = Product::all();
        return view('admin.subscriber.create', ['users' => $users, 'products' => $products]);
        // return view('admin.subscriber.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $users)
    {
       // dd(request()->all());
        $data = request()->validate([
            'user_id'=>'',
            'product_id'=>'',
            'price'=>'',
            'is_active'=>'',
           // 'subscribed_date'=>'',
            'created_by'=>''
        ]);

        
        $subscriber = new Subscriber;
        $subscriber->user_id = $data['user_id'];
        $subscriber->product_id = $data['product_id'];
        $subscriber->price = $data['price'];
        $subscriber->is_active = $data['is_active'];
     //   $subscriber->subscribed_date = $data['subscribed_date'];
        $subscriber->created_by = $data['created_by'];
        
        $subscriber->save();

        return redirect()->route('admin.index')->withSuccess("You have created new subscriber");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscribers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber, $id)
    {   
        $products = Product::all();
        $users = User::all();
        $subscriber = Subscriber::find($id);
        return view('admin.subscriber.edit',['subscriber'=>$subscriber, 'users'=>$users, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscribers,$id)
    {
        $inputs = request()->validate([
            'id'=>'',
            'user_id'=>'',
            'product_id'=>'',
            'price'=>'',
            'is_active'=>'',
             'subscribed_date'=>'' 
        ]);

        $subscribers =  Subscriber::find($id);
        $subscribers->user_id = $inputs['user_id'];
        $subscribers->product_id = $inputs['product_id'];
        $subscribers->price = $inputs['price'];
        $subscribers->is_active = $inputs['is_active'];
        $subscribers->subscribed_date = $inputs['subscribed_date'];
       
        //dd($inputs);
        $subscribers->update();
        
        return redirect()->route('admin.read');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscribers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscribers,$id)
    {
        $subscribers = Subscriber::find($id);
        $subscribers->delete();
        request()->session()->flash('message', 'Customer was deleted');
        return back();
    }

    public function read(Subscriber $subscribers){
        $products = Product::all();
        $users = User::all();  
        $subscribers = Subscriber::all();
        return view('admin.subscriber.read', ['subscribers'=>$subscribers, 'products'=>$products, 'users'=>$users]);
    }

    public function deleteSubscriber(Request $request, Subscriber $subscribers){

        $subscribers = Subscriber::findOrFail($request->checkBoxArray);

        foreach($subscribers as $subscriber){
            $subscriber->delete();
        }
       // dd($supply);
        return view('admin.subscriber.read',['subscribers'=>$subscribers]);
    }
}
