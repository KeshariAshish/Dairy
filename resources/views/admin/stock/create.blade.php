
<x-admin-master>

@section('content')

<h1>Create Stock </h1>
<div class="col-sm-6 col-md-6 col-lg-6">
    <form action="{{route('stock.store')}}" method="post" enctype="multipart/form-data">
@csrf
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" placeholder="Enter Date">
        </div>

        <div class="mb-3">
            <label for="product_id">Product Name</label>
            <select class="form-control" id="product_id" name="product_id" required>
                 @foreach($products as $product)
                     <option value = "{{$product->id}}">
                        {{$product->name}}
                     </option>
                 @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="total_quantity">Total Quantity</label>
            <input type="text" name="total_quantity" id="total_quantity" class="form-control" placeholder="Enter Total Quantity">
        </div>

        <button class="btn btn-danger" type="submit">Create</button>

    </form>
</div>

@endsection
</x-admin-master>