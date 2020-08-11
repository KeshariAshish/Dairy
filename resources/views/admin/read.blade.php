<x-admin-master>

@section('content')

<h1>All Users</h1>
@if(Session::has('message'))
<div class="alert alert-danger">{{session('message')}}</div>
@endif
<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>Id</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Home Number</th>
                      <th>Address</th>
                      <th>Locality</th>
                      <th>City</th>
                      <th>Zip Code</th>
                      <th>Location</th>
                      <th>Is Active</th>
                      <th>Phone</th>
                      <th>Created By</th>
                      <th>Is Admin</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                      <th>Email</th>
                      <th>Home Number</th>
                      <th>Address</th>
                      <th>Locality</th>
                      <th>City</th>
                      <th>Zip Code</th>
                      <th>Location</th>
                      <th>Is Active</th>
                      <th>Phone</th>
                      <th>Created By</th>
                      <th>Is Admin</th>
                      <th>Created At</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>
                 @foreach($users as $user)
                    <tr>
                      <td>{{ $user->id }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ auth()->user()->email }}</td>
                      <td>{{ $user->home_number }}</td>
                      <td>{{ $user->address }}</td>
                      <td>{{ $user->locality }}</td>
                      <td>{{ $user->city }}</td>
                      <td>{{ $user->zip_code }}</td>
                      <td>{{ $user->location }}</td>
                      <td>{{ $user->is_active }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->is_admin }}</td>
                      <td>{{ $user->created_at->diffForHumans()}}</td>
                      <td>{{ $user->updated_at->diffForHumans() }}</td>
                      <td>
                      <form action="{{route('admin.destroy', $user->id)}}" method="post" enctype="multipart/data-form">
                      @csrf
                      @method('DELETE')
                        <button class="btn btn-danger" type="submit">DELETE</button>
                      </form>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

@endsection

@section('scripts')
 <!-- Page level plugins -->
<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
<script src="{{asset('js/datatables-script.js')}}"></script>
@endsection
</x-admin-master>