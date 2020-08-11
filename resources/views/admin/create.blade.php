<x-admin-master>

@section('content')

<h1>Create User</h1>

<form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
@csrf


<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
</div>
<div>
<button class="btn btn-danger" type="submit">Create</button>
</div>
</form>

@endsection
</x-admin-master>