<x-admin-master>

@section('content')

<h1>{{__('admin-master.Evening_Supply')}}</h1>
@if(Session::has('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@endif

<form action="{{route('supply.evening')}}" method="post" class="form-inline">
  @csrf
  @method('PATCH')
  <div class="form-group mr-2">
    <select class="checkBoxArray[]" id="" class="form-control">
      <option value="update"></option>
    </select>
  </div>

  <div class="form-group">
     <input type="submit" class="btn-primary" value="{{__('admin-master.submit')}}">
  </div>

    <div class="table table-editable table-responsive">

      <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th><input type="checkbox" id="options"></th>
            <th>{{__('admin-master.Id')}}</th>
            <th>{{__('admin-master.customer_name')}}</th>
            <th>{{__('admin-master.product_name')}}</th>
            <th>{{__('admin-master.date')}}</th>
            <th>{{__('admin-master.slot')}}</th>
            <th>{{__('admin-master.quantity')}}</th>
            <!-- <th>Delete</th>
            <th>Update</th>             -->
        </tr>
      </thead>

      <tfoot>
        <tr>
          <th><input type="checkbox" id="options"></th>
          <th>{{__('admin-master.Id')}}</th>
          <th>{{__('admin-master.customer_name')}}</th>
          <th>{{__('admin-master.product_name')}}</th>
          <th>{{__('admin-master.date')}}</th>
          <th>{{__('admin-master.slot')}}</th>
          <th>{{__('admin-master.quantity')}}</th>
          <!-- <th>Delete</th>
          <th>Update</th> -->
        </tr>
      </tfoot>
      <tbody>

        @foreach($supplies as $supply)

          <tr>
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{$supply->id}}" value="{{$supply->id}}"></td>
            <td><a href="{{route('supply.edit', $supply->id)}}">{{ $supply->id }}</a></td>
            <td><input class="checkBoxes"  type="text" name="checkBoxArray[]" id="{{$supply->name}}" value="{{$supply->name}}"></td>
            <td><input class="checkBoxes"  type="text" name="checkBoxArray[]" id="{{$supply->product_name}}" value="{{$supply->product_name}}"></td>
            <td><input class="checkBoxes"  type="text" name="checkBoxArray[]" id="{{$supply->product_date}}" value="{{$supply->date}}"></td>
            <td><input class="checkBoxes"  type="text" name="checkBoxArray[]" id="{{$supply->product_slot}}" value="{{$supply->slot}}"></td>
            <td><input class="checkBoxes"  type="text" name="checkBoxArray[]" id="{{$supply->product_quantity}}" value="{{$supply->quantity}}"></td>
            <!-- <td>
              <form action="{{route('supply.destroy', $supply->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">DELETE</button>
              </form>
            </td>
            <td>
              <form action="{{route('supply.update', $supply->id)}}" method="post">
                @csrf
                @method('PATCH')
                <button class="btn btn-primary" type="submit">Update</button>
              </form>
            </td> -->
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</from>
@endsection

@section('scripts')
 <!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
<script src="{{asset('js/datatables-script.js')}}"></script>

<script>
  $(document).ready(function(){

    $('#options').click(function(){

      if(this.checked){
        $('.checkBoxes').each(function(){
            this.checked = true;
    });
        }else{
          $('.checkBoxes').each(function(){
            this.checked = false;
          });
        }

    });

  });
</script>
@endsection
</x-admin-master>
