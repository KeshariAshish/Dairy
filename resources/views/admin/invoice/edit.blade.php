<x-admin-master>

@section('content')
<h1>Edit</h1>

<form action="{{route('invoice.update', $user->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')

<div class="col-md-6">
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
</div>
<div class="form-group">
<label for="email">Email</label>
<input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
</div>
<div class="form-group">
<label for="home_number">Home Number</label>
<input type="text" name="home_number" id="home_number" class="form-control" value="{{$user->home_number}}">
</div>
<div class="form-group">
<label for="address">Address</label>
<input type="text" name="address" id="address" class="form-control" value="{{$user->address}}">
</div>
<div class="form-group">
<label for="locality">Locality</label>
<input type="text" name="locality" id="locality" class="form-control" value="{{$user->locality}}">
</div>
<div class="form-group">
<label for="city">City</label>
<input type="text" name="city" id="city" class="form-control" value="{{$user->city}}">
</div>
<div class="form-group">
<label for="zip_code">Zip Code</label>
<input type="number" name="zip_code" id="zip_code" class="form-control" value="{{$user->zip_code}}">
</div>
<div class="form-group">
<label for="location">Location</label>
<input type="text" name="location" id="location" class="form-control" value="{{$user->location}}">
</div>
<div class="form-group">
<label for="created_by">Created By</label>
<input type="text" name="created_by" id="created_by" class="form-control" value="{{$user->name}}">
</div>
<div class="form-group">
<label for="phone">Phone</label>
<input type="number" name="phone" id="phone" class="form-control" value="{{$user->phone}}">
</div>
</div>
<div>
<button class="btn btn-danger" type="submit">Update</button>
</div>
</form>

@endsection
</x-admin-master>
