<x-admin-master>

@section('content')
<h1>Edit</h1>
<div class="col-sm-6 col-lg-6 xol-md-6">
<form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')

<div class="form-group">
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
</div>

<div class="form-group">
    <label for="price">Price</label>
    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}">
</div>

<div class="form-group">
    <label for="unit">Unit</label>
    <input type="text" name="unit" id="unit" class="form-control" value="{{$product->unit}}">
</div>

<div class="mb-3">
    <label for="is_active">Is Active</label>
    <select class="form-control" id="is_active" name="is_active">
        <option value="#">Select</option>
        <option value="0" selected>0</option>
        <option value="1">1</option>
    </select>
</div>


<div class="mb-3">
    <label for="user_id">User Id</label>
    <select class="form-control" id="user_id" name="user_id">
        @foreach($users as $user)
            <option value = "{{$user->id}}">
                {{$user->name}}
            </option>
        @endforeach
    </select>
</div>

<button class="btn btn-danger" type="submit">Update</button>
</div>
</form>
</div>

@endsection
</x-admin-master>
