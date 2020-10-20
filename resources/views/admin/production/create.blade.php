<x-admin-master>

    @section('content')

        <h1>{{__('admin-master.create_production')}}</h1>
        @if(Session::has('message'))
            <div class="alert alert-success">{{session('message')}}</div>
        @endif

        <form action="{{route('production.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="date">{{__('admin-master.date')}}</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{date('Y-m-d')}}">
                </div>

                <div class=" col-md-3 mb-3">
                    <h6 class="mt-3">{{__('admin-master.slot')}}</h6>
                    <input type="radio" id="slot" name="slot" value="Morning">
                    <label for="slot">Morning</label>
                    <input type="radio" id="slot" name="slot" value="Evening">
                    <label for="slot">Evening</label>
                </div>


                <div class=" col-md-4 mb-3">
                    <label for="product_id">{{__('admin-master.product_name')}}</label>
                    <select class="form-control" id="product_id" name="product_id" required>
                        @foreach($products as $product)
                            <option value = "{{$product->id}}">
                                {{$product->name}}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="col-md-3 form-group">
                    <label for="quantity">{{__('admin-master.quantity')}}</label>
                    <input type="number" step="any" name="quantity" id="quantity" class="form-control" placeholder="{{__('admin-master.enter_quantity')}}">
                </div>

                <div class="col-md-4 form-group ml-auto" style="margin-right: 180px;">
                    <label for="available_quantity">{{__('admin-master.available_quantity')}}</label>
                    <input type="number" step="any" name="available_quantity" id="available_quantity" class="form-control" placeholder="{{__('admin-master.available_quantity')}}">
                </div>
                </div>
                <div class="col-md-4 form-group">
                    <label for="comment">{{__('admin-master.comment')}}</label>
                    {{-- <input type="text" name="comment" id="comment" class="form-control"> --}}
                    <textarea  name="comment" id="comment" cols="20" rows="5" style="width: 100%" placeholder="{{__('admin-master.comment_here')}}"></textarea>
                </div>
                <div>
                    <button class="btn btn-primary ml-3" type="submit">{{__('admin-master.create')}}</button>
                    <a href="{{ route('production.read') }}" class="btn btn-success" style="margin-top: 0px; margin-left: 5px;">Cancel</a>
                </div>
        </form>
    @endsection
</x-admin-master>
