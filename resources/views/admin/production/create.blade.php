<x-admin-master>

    @section('content')

    <h1>Create Production</h1>

    <div class="col-sm-4 col-md-4 col-lg-4">
    <form action="{{route('production.store')}}" method="post" enctype="multipart/form-data">
    @csrf

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

    <div class="mb-3">
        <h6>Slot</h6>
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
        <label for="quantity">Quantity</label>
        <input type="number" step="any" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity">
    </div>

    <div class="form-group">
        <label for="available_quantity">Available Quantity</label>
        <input type="number" step="any" name="available_quantity" id="available_quantity" class="form-control" placeholder="Available Quantity">
    </div>

    <div class="form-group">
        <label for="comment">Comment</label>
        <input type="text" name="comment" id="comment" class="form-control" placeholder="Comment Here">
    </div>

    <div class="form-group">
        <label for="created_by">Created By</label>
        <input type="text" name="created_by" id="created_by" class="form-control" value="{{auth()->user()->name}}">
    </div>

    <div class="form-group">
        <label for="updated_by">Updated By</label>
    <input type="text" name="updated_by" id="updated_by" class="form-control" placeholder="Updated By" >
    </div>

    <div class="form-group">
        <label for="date">Date</label>
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

    <button class="btn btn-danger" type="submit">Create</button>
    <a href="{{ route('production.read' )}}" class="btn btn-success">Cancel</a>
    </div>
    </form>
    </div>

    @endsection

    </x-admin-master>
