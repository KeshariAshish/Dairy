<x-admin-master>

@section('content')

<h1>All Users</h1>
@if(Session::has('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@endif
<form action="{{route('admin.delete')}}" method="post" class="form-inline">
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
            <th>{{__('admin-master.Id')}}</th>
            <th>{{__('admin-master.name')}}</th>
            <th>{{__('admin-master.email')}}</th>
            <th>{{__('admin-master.home_number')}}</th>
            <th>{{__('admin-master.address')}}</th>
            <th>{{__('admin-master.locality')}}</th>
            <th>{{__('admin-master.city')}}</th>
            <th>{{__('admin-master.zip_code')}}</th>
            <th>{{__('admin-master.location')}}</th>
            <th>{{__('admin-master.active_customer')}}</th>
            <th>{{__('admin-master.phone')}}</th>
            <th>{{__('admin-master.created_by')}}</th>
            <th>{{__('admin-master.is_admin')}}</th>
            <th>{{__('admin-master.created_at')}}</th>
            <th>{{__('admin-master.updated_at')}}</th>
            <th>{{__('admin-master.delete')}}</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th><input type="checkbox" id="options"></th>
            <th>{{__('admin-master.Id')}}</th>
            <th>{{__('admin-master.name')}}</th>
            <th>{{__('admin-master.email')}}</th>
            <th>{{__('admin-master.home_number')}}</th>
            <th>{{__('admin-master.address')}}</th>
            <th>{{__('admin-master.locality')}}</th>
            <th>{{__('admin-master.city')}}</th>
            <th>{{__('admin-master.zip_code')}}</th>
            <th>{{__('admin-master.location')}}</th>
            <th>{{__('admin-master.active_customer')}}</th>
            <th>{{__('admin-master.phone')}}</th>
            <th>{{__('admin-master.created_by')}}</th>
            <th>{{__('admin-master.is_admin')}}</th>
            <th>{{__('admin-master.created_at')}}</th>
            <th>{{__('admin-master.updated_at')}}</th>
            <th>{{__('admin-master.delete')}}</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{$user->id}}" value="{{$user->id}}"></td>
            <td>{{ $user->id }}</td>
            <td><a href="{{route('admin.edit', $user->id)}}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->home_number }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->locality }}</td>
            <td>{{ $user->city }}</td>
            <td>{{ $user->zip_code }}</td>
            <td>{{ $user->location }}</td>
            <td>{{ $user->is_active }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->is_Admin }}</td>
            <td>{{ $user->created_at->format(date('d-m-Y')) }}</td>
            <td>{{ $user->updated_at->format(date('d-m-Y')) }}</td>
            <td>
              <form action="{{route('admin.destroy', $user->id)}}" method="post">
                @csrf
                @method('DELETE')
              <button class="btn btn-danger" type="submit">{{__('admin-master.delete')}}</button>
              </form>
            </td>
          </tr>
           @endforeach
        </tbody>
      </table>
    </div>
</form?

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
