<?php

namespace App\Http\Controllers;

use App\User;
use App\Invoice;
use App\Product;
use PDF;
use DB;
use App\Supply;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){


     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Invoice $invoices, User $users, Product $products)
    {
        $users = User::all();
        $products = Product::all();

        return view('admin.invoice.create',['users'=>$users, 'products'=>$products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Invoice $invoices,Request $request)
    {
         // dd(request()->all());
        $request = request()->validate([
            'user_id'=>'required',
            'product_id'=>'required',
            'total_quantity' => 'required',
            'price'=>'required',
            'total_amount'=>'',
            'paid_amount'=>'',
            'due_amount'=>'',
            'is_paid'=>'',
            'payment_mode'=>'',
            // 'payment_received_by'=>'required',
            'created_by'=>''
        ]);
      // dd($request);
      $products = Product::select( 'products.*')
                            ->join('users', 'users.id', '=', 'products.user_id')
                            ->where('products.id', '=', $request->get('id'))
                            ->where('products.user_id', '=', $request->get('user_id'));
        Invoice::create([
            'user_id'               =>  $request['user_id'],
            'product_id'            =>  $request['product_id'],
            'total_quantity'        =>  $request['total_quantity'],
            'price'                 =>  $request['price'],
            'total_amount'          =>  $request['total_quantity'] * $request['price'],
            'paid_amount'           =>  0,
            'due_amount'            =>  $request['total_quantity'] * $request['price'],
            'is_paid'               =>  0,
            'payment_mode'          =>  "Cash",
            // 'payment_received_by'   =>auth()->user()->id,
            'created_by'            =>auth()->user()->id
        ]);

        request()->session()->flash('message', 'Invoice was created');
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
    public function edit(Invoice $invoices, $id)
    {
        $user = User::all();
        $products = Product::all();
        $invoice = Invoice::find($id);
        return view('admin.invoice.edit',['invoice'=>$invoice, 'user'=>$user, 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Invoice $invoices,Request $request, $id)
    {
        $inputs = request()->validate([
            'user_id'=>'required',
            'product_id'=>'required',
            'total_quantity' => 'required',
            'price'=>'required',
            'total_amount'=>'required',
            'paid_amount'=>'required',
            'due_amount'=>'required',
            'is_paid'=>'required',
            'payment_mode'=>'required',
        ]);

        $invoices = Invoice::find($id);
        $invoices->id = $inputs['id'];
        $invoices->user_id = $inputs['user_id'];
        $invoices->product_id = $inputs['total_quantity'];
        $invoices->price = $inputs['price'];
        $invoices->total_amount = $inputs['total_amount'];
        $invoices->paid_amount = $inputs['paid_amount'];
        $invoices->due_amount = $inputs['due_amount'];
        $invoices->is_paid = $inputs['is_paid'];
        $invoices->payment_mode = $inputs['payment_mode'];
       // dd($inputs);
        $invoices->update();

        return redirect()->route('admin.invoices.read',['invoices'=>$invoices]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoices = Invoice::find($id);
        $invoices->delete();
        request()->session()->flash('message', 'Invoice was deleted');
        return back();
    }

    public function read(Invoice $invoices){

        $invoices = Invoice::select('invoices.*', 'users.name',  'products.name as product_name')
                    ->join('users', 'users.id', '=', 'invoices.user_id')
                    ->join('products', 'products.id', '=', 'invoices.product_id')
                    ->get();
        return view('admin.invoice.read',['invoices'=>$invoices]);

    }

    public function createPDF() {

        $invoices = Invoice::select('invoices.*', 'users.name',  'products.name as product_name')
                    ->join('users', 'users.id', '=', 'invoices.user_id')
                    ->join('products', 'products.id', '=', 'invoices.product_id')
                    ->get();

        view()->share('invoices',$invoices);
        $pdf = PDF::loadView('admin.invoice.pdf', $invoices);
        return $pdf->download('Invoice.pdf');
      }
}
