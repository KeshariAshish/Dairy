<x-admin-master>

@section('content')

<h1>Stock</h1>
@if(Session::has('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@endif

<form action="{{route('stock.delete')}}" method="post" class="form-inline">
  @csrf
  @method('DELETE')
  <div class="form-group mr-2">
    <select class="checkBoxArray[]" id="" class="form-control">
      <option value="delete">Delete</option>
    </select>
  </div>

  <div class="form-group">
    <input type="submit" class="btn-primary">
  </div>

  <div class="table table-responsive">
  <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>Id</th>
        <th>Date</th>
        <th>Product id</th>
        <th>Total Quantity</th>
        <th>Available Quantity</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Delete</th>             
      </tr>
    </thead>
    
    <tfoot>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>Id</th>
        <th>Date</th>
        <th>Product id</th>
        <th>Total Quantity</th>
        <th>Available Quantity</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Delete</th>      
      </tr>
    </tfoot>
    <tbody>

      @foreach($stocks as $stock)
      @foreach($products as $product)
        <tr>
          <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{$stock->id}}" value="{{$stock->id}}"></td>
          <td><a href="{{route('stock.edit', $stock->id)}}">{{ $stock->id }}</a></td>
          <td>{{ $stock->date }}</td>
          <td>{{ $product->name}}</td>
          <td>{{ $stock->total_quantity }}</td>
          <td>{{ $stock->available_quantity }}</td>
          <td>{{ $stock->created_at->diffForHumans()}}</td>
          <td>{{ $stock->updated_at->diffForHumans() }}</td>
          <td>           
            <form action="{{route('stock.destroy', $stock->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">DELETE</button>
            </form>
          </td>
        </tr>
       @endforeach 
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