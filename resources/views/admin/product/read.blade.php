<x-admin-master>

@section('content')

<h1>Products</h1>
@if(Session::has('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@endif

<form action="{{route('product.delete')}}" method="post" class="form-inline">
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
  <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
          <th><input type="checkbox" id="options"></th>
          <th>Id</th>
          <th>Name</th>
          <th>Price</th>
          <th>Unit</th>
          <th>Is Active</th>
          <th>Customer Name</th>
          <th>Created At</th>
          <th>Updated At</th>
         <th>Delete</th>
       </tr>
    </thead>
    <tfoot>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Unit</th>
        <th>Is Active</th>
        <th>Customer Name</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Delete</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{$product->id}}" value="{{$product->id}}"></td>
          <td>{{ $product->id }}</td>
          <td><a href="{{route('product.edit', $product->id)}}">{{ $product->name }}</a></td>
          <td>{{ $product->price }}</td>
          <td>{{ $product->unit }}</td>
          <td>{{ $product->is_active }}</td>
          <td>{{$product->user_name}}</td>
          <td>{{ $product->created_at->diffForHumans()}}</td>
          <td>{{ $product->updated_at->diffForHumans() }}</td>
          <td>
            <form action="{{route('product.destroy', $product->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">DELETE</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</from>

@endsection

@section('scripts')
 <!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
<script src="{{asset('js/datatables-script.js')}}"></script>
@endsection

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

</x-admin-master>
