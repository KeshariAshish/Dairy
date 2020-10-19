<x-admin-master>

    @section('content')
        <h1>Edit</h1>

        <form action="{{route('invoice.update', $invoice->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="col-md-4 form-group">
                <label for="total_quantity">Total Quantity</label>
                <input type="number" name="total_quantity" id="total_quantity" class="form-control" value="{{ $invoice->total_quantity }}">
            </div>

            <div class="col-md-4 form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" value="{{ $invoice->price }}">
            </div>

            <div>
                <button class="btn btn-success" type="submit">Update</button>
            </div>
        </form>

    @endsection
</x-admin-master>
