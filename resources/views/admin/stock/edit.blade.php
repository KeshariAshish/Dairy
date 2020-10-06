<x-admin-master>

@section('content')
<h1>Edit</h1>
<div class="col-sm-6 col-md-6 col-lg-6">
    <form action="{{route('stock.update', $stocks->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="id">Id</label>
            <input type="text" name="id" id="id" class="form-control" value="{{ $stocks->id }}">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ $stocks->date }}">
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
            <input type="text" name="total_quantity" id="total_quantity" class="form-control" value="{{$stocks->total_quantity}}">
        </div>

        <div class="form-group">
            <label for="available_quantity">Avalable Quantity</label>
            <input type="text" name="available_quantity" id="available_quantity" class="form-control" value="{{$stocks->available_quantity}}">
        </div>

        <button class="btn btn-danger" type="submit">Update</button>

    </form>
</div>

@endsection
</x-admin-master>
