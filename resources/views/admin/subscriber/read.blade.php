<x-admin-master>

@section('content')

<h1>Subscribers</h1>
@if(Session::has('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@endif
<form action="{{route('subscriber.delete')}}" method="post" class="form-inline">
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
  <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>Id</th>
        <th>User Name</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Is Active</th>
        <th>Subscribed Date</th>
        <th>Created By</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <th><input type="checkbox" id="options"></th>
        <th>Id</th>
        <th>User Name</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Is Active</th>
        <th>Subscribed Date</th>
        <th>Created By</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Delete</th>
      </tr>
    </tfoot>
    <tbody>
      @foreach($subscribers as $subscriber)
      @foreach($users as $user)
      @foreach($products as $product)
        <tr>
          <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{$subscriber->id}}" value="{{$subscriber->id}}"></td>
          <td>{{ $subscriber->id }}</a></td>
          <td>{{ $user->name }}</td>
          <td>{{ $product->name}}</td>
          <td><a href="{{route('subscriber.edit', $subscriber->id)}}">{{ $subscriber->price }}<a></td>
          <td>{{ $subscriber->is_active }}</td>
          <td>{{ $subscriber->subscribed_date }}</td>
          <td>{{ $subscriber->created_by}}</td>
          <td>{{ $subscriber->created_at->diffForHumans()}}</td>
          <td>{{ $subscriber->updated_at->diffForHumans() }}</td>
          <td>
            <form action="{{route('subscriber.destroy', $subscriber->id)}}" method="post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">DELETE</button>
            </form>
          </td>
        </tr>
      @endforeach
      @endforeach
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
