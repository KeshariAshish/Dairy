
<x-admin-master>

@section('content')

    <h1>Create Supply </h1>

    <div class="col-sm-6 col-md-6 col-lg-6">
        <form action="{{route('supply.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="user_id">Customer Name</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value = "{{$user->id}}">
                            {{$user->name}}
                        </option>
                    @endforeach
                 </select>
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
                <label for="slot">Slot</label>
                <input type="text" name="slot" id="slot" class="form-control" placeholder="Enter Slot">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" id="date" class="form-control" placeholder="Enter Date">
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity">
            </div>

            <button class="btn btn-danger" type="submit">Create</button>

        </form>
    </div>
@endsection
</x-admin-master>