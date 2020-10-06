<x-admin-master>

@section('content')

<h1>Morning Supply</h1>
@if(Session::has('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@endif

<form action="{{route('supply.update')}}" method="post" class="form-inline">
  @csrf
  @method('PATCH')
  <div class="form-group mr-2">
    <select class="checkBoxArray[]" id="" class="form-control">
      <option value="update"></option>
    </select>
  </div>

  <div class="form-group">
    <input type="submit" class="btn-primary">
  </div>
    <div class="table table-editable table-responsive">
  <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>Id</th>
        <th>User Name</th>
        <th>Product Name</th>
        <th>Date</th>
        <th>Slot</th>
        <th>Quantity</th>
        <!-- <th>Delete</th>              -->
      </tr>
    </thead>
    
    <tfoot>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>Id</th>
        <th>User Name</th>
        <th>Product Name</th>
        <th>Date</th>
        <th>Slot</th>
        <th>Quantity</th>
        <!-- <th>Delete</th> -->
      </tr>
    </tfoot>
    <tbody>

      @foreach($supplies as $supply)
        <tr>
          <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{$supply->id}}" value="{{$supply->id}}"></td>
          <td><a href="{{route('supply.edit', $supply->id)}}">{{ $supply->id }}</a></td>
          <td>{{ $supply->name }}</td>
          <td>{{ $supply->product_name}}</td>
          <td class="pt-3-half" contenteditable="true" name="date" id="date">{{ $supply->date }}</td>
          <td>{{ $supply->slot }}</td>
          <td class="pt-3-half" contenteditable="true" name="quantity" id="quantity">{{ $supply->quantity }}</td>
          <!-- <td>           
            <form action="{{route('supply.destroy', $supply->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">DELETE</button>
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