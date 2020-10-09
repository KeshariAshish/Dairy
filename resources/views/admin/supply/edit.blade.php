<x-admin-master>

    @section('content')
        <h1>Edit</h1>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <form action="{{route('supply.update', $supplies->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" name="id" id="id" class="form-control" value="{{ $supplies->id }}">
                </div>

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
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{$supplies->date}}">
                </div>

                <div class="form-group">
                    <label for="slot">Slot</label>
                    <input type="text" name="slot" id="slot" class="form-control" value="{{$supplies->slot}}">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" id="quantity" class="form-control" value="{{$supplies->quantity}}">
                </div>

                <div class="form-group">
                    <label for="created_by">Created By</label>
                    <input type="text" name="created_by" id="created_by" class="form-control" value="{{auth()->user()->name}}">
                </div>

                <button class="btn btn-danger" type="submit">Update</button>

            </form>
        </div>
    @endsection
</x-admin-master>
