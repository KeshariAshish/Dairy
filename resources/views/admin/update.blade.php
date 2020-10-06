<!-- <x-admin-master>

@section('content')
<h1>Edit User</h1>

<form action="{{route('admin.update', auth()->user()->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')

<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" id="password" class="form-control">
</div>

<div>
<button class="btn btn-danger" type="submit">Update</button>
</div>
</form>

@endsection
</x-admin-master> -->
