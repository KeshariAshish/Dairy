<x-admin-master>

    @section('content')
    <h1>Edit</h1>
    <div class="col-sm-6 col-lg-6 xol-md-6">
    <form action="{{route('production.update', $production->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="slot">Production Slot</label>
        <input type="text" name="slot" id="slot" class="form-control" value="{{ $production->slot }}">
    </div>

    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $production->quantity }}">
    </div>

    <div class="form-group">
        <label for="available_quantity">Available Quantity</label>
        <input type="number" name="available_quantity" id="available_quantity" class="form-control" value="{{$production->available_quantity}}">
    </div>



    {{-- <div class="mb-3">
        <label for="is_active">Is Active</label>
        <select class="form-control" id="is_active" name="is_active">
            <option value="#">Select</option>
            <option value="0" selected>0</option>
            <option value="1">1</option>
        </select>
    </div> --}}


    {{-- <div class="mb-3">
        <label for="user_id">User Id</label>
        <select class="form-control" id="user_id" name="user_id">
            @foreach($users as $user)
                <option value = "{{$user->id}}">
                    {{$user->name}}
                </option>
            @endforeach
        </select>
    </div> --}}

    <button class="btn btn-danger" type="submit">Update</button>
    </div>
    </form>
    </div>

    @endsection
    </x-admin-master>
