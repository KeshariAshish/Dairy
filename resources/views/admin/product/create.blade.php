<x-admin-master>

@section('content')

<h1>{{__('admin-master.create_product')}}</h1>

<div class="col-sm-4 col-md-4 col-lg-4">
<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
@csrf


<div class="form-group ">
    <label for="name">{{__('admin-master.product_name')}}</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="{{__('admin-master.enter_name')}}">
</div>

<div class="form-group">
    <label for="price">{{__('admin-master.product_price')}}</label>
    <input type="text" name="price" id="price" class="form-control" placeholder="{{__('admin-master.enter_price')}}">
</div>

<div class="form-group">
    <label for="unit">{{__('admin-master.product_unit')}}</label>
    <input type="text" name="unit" id="unit" class="form-control" placeholder="{{__('admin-master.enter_unit')}}">
</div>
<div class="mb-3">
    <label for="is_active">{{__('admin-master.active_customer')}}</label>
    <select class="form-control" id="is_active" name="is_active" required>
        <option value="0" selected>0</option>
        <option value="1">1</option>
    </select>
</div>

<div class="mb-3">
    <label for="user_id">{{__('admin-master.customer_name')}}</label>
    <select class="form-control" id="user_id" name="user_id" required>
        @foreach($users as $user)
            <option value = "{{$user->id}}">
            {{$user->name}}
            </option>
        @endforeach
    </select>
</div>

<button class="btn btn-primary" type="submit">{{__('admin-master.create')}}</button>
</div>
</form>
</div>

@endsection
</x-admin-master>
