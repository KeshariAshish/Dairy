<x-admin-master>

    @section('content')

    <h1>{{__('admin-master.create_production')}}</h1>

    <div class="col-sm-4 col-md-4 col-lg-4">
    <form action="{{route('production.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="product_id">{{__('admin-master.product_name')}}</label>
        <select class="form-control" id="product_id" name="product_id" required>
             @foreach($products as $product)
                 <option value = "{{$product->id}}">
                    {{$product->name}}
                 </option>
             @endforeach
        </select>
    </div>

    <div class="mb-3">
        <h6>{{__('admin-master.slot')}}</h6>
        <input type="radio" id="slot" name="slot" value="Morning">
        <label for="slot">Morning</label>
        <input type="radio" id="slot" name="slot" value="Evening">
        <label for="slot">Evening</label>
        {{-- <select class="form-control" id="slot" name="slot" required>
            <option value="Morning" selected>Morning</option>
            <option value="Evening">Evening</option>
        </select> --}}
    </div>

    <div class="form-group">
        <label for="quantity">{{__('admin-master.quantity')}}</label>
        <input type="number" step="any" name="quantity" id="quantity" class="form-control" placeholder="{{__('admin-master.enter_quantity')}}">
    </div>

    <div class="form-group">
        <label for="available_quantity">{{__('admin-master.available_quantity')}}</label>
        <input type="number" step="any" name="available_quantity" id="available_quantity" class="form-control" placeholder="{{__('admin-master.available_quantity')}}">
    </div>

    <div class="form-group">
        <label for="comment">{{__('admin-master.comment')}}</label>
        <input type="text" name="comment" id="comment" class="form-control" placeholder="{{__('admin-master.comment_here')}}">
    </div>

    <div class="form-group">
        <label for="created_by">{{__('admin-master.created_by')}}</label>
        <input type="text" name="created_by" id="created_by" class="form-control" value="{{auth()->user()->name}}">
    </div>

    <div class="form-group">
        <label for="updated_by">{{__('admin-master.updated_by')}}</label>
    <input type="text" name="updated_by" id="updated_by" class="form-control" placeholder="{{__('admin-master.create')}}" >
    </div>

    <div class="form-group">
        <label for="date">{{__('admin-master.date')}}</label>
        <input type="date hidden" name="date" id="date" class="form-control" value="{{date('Y-m-d')}}">
    </div>

    {{-- <div class="mb-3">
        <label for="user_id">Customer Name</label>
        <select class="form-control" id="user_id" name="user_id" required>
            @foreach($users as $user)
                <option value = "{{$user->id}}">
                {{$user->name}}
                </option>
            @endforeach
        </select>
    </div> --}}

    <button class="btn btn-danger" type="submit">{{__('admin-master.create')}}</button>
    <a href="{{ route('production.read' )}}" class="btn btn-success">{{__('admin-master.cancel')}}</a>
    </div>
    </form>
    </div>

    @endsection

    </x-admin-master>
