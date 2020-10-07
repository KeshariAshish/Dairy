
<x-admin-master>

@section('content')

    <h1>{{__('admin-master.Create_Supply')}}</h1>

    <div class="col-sm-6 col-md-6 col-lg-6">
        <form action="{{route('supply.store')}}" method="post" enctype="multipart/form-data">
            @csrf
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
                <label for="date">{{__('admin-master.date')}}</label>
                <input type="date" name="date" id="date" class="form-control" placeholder="{{__('admin-master.enter_date')}}" value="{{date('Y-m-d')}}">
            </div>

            <div class="form-group">
                <label for="quantity">{{__('admin-master.quantity')}}</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="{{__('admin-master.enter_quantity')}}">
            </div>

            <button class="btn btn-primary" type="submit">{{__('admin-master.create')}}</button>

        </form>
    </div>
@endsection
<script>
    $(function(){

        $('#date').datepicker({
            format: 'mm-dd-yyyy',
            endDate: '+0d',
            autoclose: true
        });
    });
</script>
</x-admin-master>
