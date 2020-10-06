<x-admin-master>

@section('content')
<h1>Edit</h1>
<div class="col-sm-6 col-md-6 col-lg-6">
    <form action="{{route('subscriber.update', $subscriber->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')


        <div class="mb-3">
            <label for="user_id">Customer Name</label>
            <select class="form-control" id="user_id" name="user_id" required>
                <option value="#">Select</option>
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
                <option value="#">Select</option>
                    @foreach($products as $product)
                        <option value = "{{$product->id}}">
                        {{$product->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{$subscriber->price}}">
       </div>
        <div class="mb-3">
            <label for="is_active">Is Active</label>
            <select class="form-control" id="is_active" name="is_active" required>
                <option value="#">Select</option>
                <option value="0" selected>0</option>
                <option value="1">1</option>
             </select>
        </div>  

        <div class="form-group">
            <label for="subscribed_date">Subscribed Date</label>
            <input type="date" name="subscribed_date" id="subscribed_date" class="form-control" value="{{$subscriber->subscribed_date}}">
        </div>

        <div class="form-group">
            <label for="created_by">Created By</label>
            <input type="text" name="created_by" id="created_by" class="form-control" value="{{auth()->user()->name}}">
        </div>
            <button class="btn btn-danger" type="submit">Update</button>
        </div>
    </form>
</div>
@endsection
</x-admin-master>
