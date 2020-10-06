<x-admin-master>

@section('content')

<h1>Create Product</h1>

<div class="col-sm-4 col-md-4 col-lg-4">
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
@csrf


<div class="form-group ">
    <label for="name">Product Name</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
</div>

<div class="form-group">
    <label for="price">Product Price</label>
    <input type="text" name="price" id="price" class="form-control" placeholder="Enter Price">
</div>

<div class="form-group">
    <label for="unit">Product Unit</label>
    <input type="text" name="unit" id="unit" class="form-control" placeholder="Enter Unit">
</div>
<div class="mb-3">
    <label for="is_active">Is Active</label>
    <select class="form-control" id="is_active" name="is_active" required>
        <option value="0" selected>0</option>
        <option value="1">1</option>
    </select>
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

<button class="btn btn-danger" type="submit">Create</button>
</div>
</form>
</div>

@endsection
</x-admin-master>
