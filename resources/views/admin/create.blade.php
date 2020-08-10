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
<div class="form-group">
<label for="home_number">Home Number</label>
<input type="text" name="home_number" id="home_number" class="form-control" placeholder="Enter Home Number">
</div>
<div class="form-group">
<label for="address">Address</label>
<input type="text" name="address" id="address" class="form-control" placeholder="Enter Your Address">
</div>
<div class="form-group">
<label for="locality">Locality</label>
<input type="text" name="locality" id="locality" class="form-control" placeholder="Enter Your Locality">
</div>
<div class="form-group">
<label for="city">City</label>
<input type="text" name="city" id="city" class="form-control" placeholder="Enter Your City">
</div>
<div class="form-group">
<label for="zip_code">Zip Code</label>
<input type="number" name="zip_code" id="zip_code" class="form-control" placeholder="Enter Your Zip Code">
</div>
<div class="form-group">
<label for="location">Location</label>
<input type="text" name="location" id="location" class="form-control" placeholder="Enter Your Location">
</div>
<div class="form-group">
<label for="is_active">Is Active</label>
<div>
<input type="checkbox" id="0" name="is_active" checked>
<label for="is_active">NO</label>
<input type="checkbox" id="1" name="is_active" >
<label for="is_active">YES</label>
</div>
</div>
<div class="form-group">
<label for="phone">Phone</label>
<input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Your Phone Number">
</div>
<div class="form-group">
<label for="created_by">Created By</label>
<input type="text" name="created_by" id="created_by" class="form-control" placeholder="Enter User Name">
</div>
<div class="form-group">
<label for="is_active">Is Admin</label>
<div>
<input type="checkbox" id="0" name="is_admin" checked>
<label for="is_active">NO</label>
<input type="checkbox" id="1" name="is_admin" >
<label for="is_active">YES</label>
</div>
</div>
<button class="btn btn-danger" type="submit">Create</button>
</form>

@endsection
</x-admin-master>