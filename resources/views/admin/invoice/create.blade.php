
<x-admin-master>

    @section('content')

        <h1>Create Invoice</h1>


        <form action="{{ route('invoice.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="user_id">{{__('admin-master.customer_name')}}</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        @foreach($users as $user)
                            <option value = "{{$user->id}}">
                                {{$user->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="product_id">{{__('admin-master.product_name')}}</label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        @foreach($products as $product)
                            <option value = "{{$product->id}}">
                                {{$product->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="total_quantity">Total Quantity</label>
                    <input type="number" name="total_quantity" id="total_quantity" class="form-control" placeholder="Total Quantity">
                </div>

                <div class="col-md-4 form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Price per quantity">
                </div>
            </div>
                {{-- <div class="col-md-4 form-group">
                    <label for="total_amount">Total Amount</label>
                    <input type="number" name="total_amount" id="total_amount" class="form-control" placeholder="Total Amount">
                </div> --}}
{{--  --}}
                {{-- <div class="col-md-4 form-group">
                    <label for="paid_amount">Paid Amount</label>
                    <input type="number" name="paid_amount" id="paid_amount" class="form-control" placeholder="Paid Amount">
                </div> --}}

                {{-- <div class="col-md-4 form-group">
                    <label for="due_amount">Due Amount</label>
                    <input type="number" name="due_amount" id="due_amount" class="form-control" placeholder="Due Amount">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="is_paid">Is Paid</label>
                    <select class="form-control" id="is_paid" name="is_paid" required>
                        <option value="No" selected>No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div> --}}

                {{-- <div class="col-md-4 mb-3">
                    <label for="payment_mode">Payment Mode</label>
                    <select class="form-control" id="payment_mode" name="payment_mode" required>
                        <option value="Cash" selected>Cash</option>
                        <option value="Paytm">Paytm</option>
                    </select>
                </div> --}}

            <div class="row">
                <button class="btn btn-primary ml-3" style="margin-top: 32px" type="submit">{{__('admin-master.create')}}</button>
            </div>

        </form>

    @endsection

</x-admin-master>
