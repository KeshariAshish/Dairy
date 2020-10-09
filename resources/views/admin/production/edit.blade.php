<x-admin-master>

    @section('content')
        <h1>Edit</h1>
        @if(Session::has('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @endif
        <div class="col-md-4">
            <form action="{{route('production.update', $production->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date hidden" name="date" id="date" class="form-control" value="{{ $production->date }}">
                </div>
                <div class="form-group">
                    <label for="slot">Production Slot</label>
                    <br>
                    <input type="radio" id="slot" name="slot" value="Morning">
                    <label for="slot">Morning</label>
                    <input type="radio" id="slot" name="slot" value="Evening">
                    <label for="slot">Evening</label>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $production->quantity }}">
                </div>

                <div class="form-group">
                    <label for="available_quantity">Available Quantity</label>
                    <input type="number" name="available_quantity" id="available_quantity" class="form-control" value="{{$production->available_quantity}}">
                </div>

                <button class="btn btn-primary" type="submit">Update</button>
            </form>
        </div>
    @endsection
</x-admin-master>
