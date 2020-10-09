<x-admin-master>

    @section('content')

        <h1>{{__('admin-master.create_product')}}</h1>


        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-3 form-group ">
                    <label for="name">{{__('admin-master.product_name')}}</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="{{__('admin-master.enter_name')}}">
                </div>

                <div class="col-md-3 form-group">
                    <label for="price">{{__('admin-master.product_price')}}</label>
                    <input type="text" name="price" id="price" class="form-control" placeholder="{{__('admin-master.enter_price')}}">
                </div>

                <div class="col-md-3 form-group">
                    <label for="unit">{{__('admin-master.product_unit')}}</label>
                    <input type="text" name="unit" id="unit" class="form-control" placeholder="{{__('admin-master.enter_unit')}}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="is_active">{{__('admin-master.active_customer')}}</label>
                    <select class="form-control" id="is_active" name="is_active" required>
                        <option value="0" selected>0</option>
                        <option value="1">1</option>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="user_id">{{__('admin-master.customer_name')}}</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        @foreach($users as $user)
                            <option value = "{{$user->id}}">
                            {{$user->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button class="btn btn-primary" style="margin-top: 32px" type="submit">{{__('admin-master.create')}}</button>
                </div>
            </div>
        </form>


    @endsection
</x-admin-master>
