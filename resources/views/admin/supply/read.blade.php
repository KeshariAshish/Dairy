<x-admin-master>

@section('content')

    <h1>{{__('admin-master.Supply')}}</h1>
    @if(Session::has('message'))
        <div class="alert alert-danger">{{session('message')}}</div>
    @endif

    <form action="{{route('supply.delete')}}" method="post" class="form-inline">
    @csrf
    @method('DELETE')
    <div class="form-group mr-2">
        <select class="checkBoxArray[]" id="" class="form-control">
        <option value="delete">{{__('admin-master.delete')}}</option>
        </select>
    </div>

  <div class="form-group">
    <input type="submit" class="btn-primary" value="{{__('admin-master.submit')}}">
  </div>

  <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>{{__('admin-master.Id')}}</th>
        <th>{{__('admin-master.customer_name')}}</th>
        <th>{{__('admin-master.product_name')}} </th>
        <th>{{__('admin-master.date')}}</th>
        <th>{{__('admin-master.slot')}}</th>
        <th>{{__('admin-master.quantity')}}</th>
        <th>{{__('admin-master.created_by')}}</th>
        <th>{{__('admin-master.created_at')}}</th>
        <th>{{__('admin-master.updated_at')}}</th>
        <th>{{__('admin-master.delete')}}</th>
      </tr>
    </thead>

    <tfoot>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>{{__('admin-master.Id')}}</th>
        <th>{{__('admin-master.customer_name')}}</th>
        <th>{{__('admin-master.product_name')}} </th>
        <th>{{__('admin-master.date')}}</th>
        <th>{{__('admin-master.slot')}}</th>
        <th>{{__('admin-master.quantity')}}</th>
        <th>{{__('admin-master.created_by')}}</th>
        <th>{{__('admin-master.created_at')}}</th>
        <th>{{__('admin-master.updated_at')}}</th>
        <th>{{__('admin-master.delete')}}</th>
      </tr>
    </tfoot>
    <tbody>

      @foreach($supplies as $supply)
        <tr>
          <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{$supply->id}}" value="{{$supply->id}}"></td>
          <td><a href="{{route('supply.edit', $supply->id)}}">{{ $supply->id }}</a></td>
          <td>{{ $supply->name }}</td>
          <td>{{ $supply->product_name}}</td>
          <td>{{ $supply->date }}</td>
          <td>{{ $supply->slot }}</td>
          <td>{{ $supply->quantity }}</td>
          <td>{{ $supply->created_by }}</td>
          <td>{{ $supply->created_at }}</td>
          <td>{{ $supply->updated_at }}</td>
          <td>
            <form action="{{route('supply.destroy', $supply->id)}}" method="post">
              @csrf
              @method('DELETE')
            <button class="btn btn-danger" type="submit">{{__('admin-master.delete')}}</button>
            </form>
          </td>
        </tr>
       @endforeach
    </tbody>
  </table>
</form>
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
