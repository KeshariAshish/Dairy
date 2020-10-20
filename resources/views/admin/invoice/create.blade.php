
<x-admin-master>

    @section('content')
        @if(Session::has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif
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
                    <input type="number" name="total_quantity" id="total_quantity" class="form-control" value="{{ $products->sum('unit')}}">
                </div>

                <div class="col-md-4 form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $products->sum('price') }}">
                </div>
            </div>

            <div class="row">
                <button class="btn btn-primary ml-3" style="margin-top: 32px" type="submit">{{__('admin-master.create')}}</button>
                <a href="{{ route('invoice.read') }}" class="btn btn-success" style="margin-top: 32px; margin-left: 5px;">Cancel</a>
            </div>

        </form>

    @endsection

</x-admin-master>
