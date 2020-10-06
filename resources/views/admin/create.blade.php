<x-admin-master>

@section('content')

<h1>Create User</h1>

<form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
@csrf

  <div class="col-md-6 col-sm-6 col-lg-6">
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
      <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
    </div>

    <div class="form-group">
      <label for="locality">Locality</label>
      <input type="text" name="locality" id="locality" class="form-control" placeholder="Enter Locality">
    </div>

    <div class="form-group">
      <label for="city">City</label>
      <input type="text" name="city" id="city" class="form-control" placeholder="Enter City">
    </div>

    <div class="form-group">
      <label for="zip_code">Zip Code</label>
      <input type="number" name="zip_code" id="zip_code" class="form-control" placeholder="Enter Zip Code">
    </div>

    <div class="form-group">
      <label for="location">Location</label>
      <input type="location" name="location" id="location" class="form-control" placeholder="Enter Location">
    </div>

    <div class="mb-3">
        <label for="is_active">Active Customer</label>
        <select class="form-control" id="is_active" name="is_active" required>
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
        </select>
    </div>

    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number">
    </div>

    {{-- <div class="form-group">
      <label for="created_by">Created By</label>
      <input type="text" name="created_by" id="created_by" class="form-control" value="{{auth()->user()->name}}">
    </div> --}}

    <div class="mb-3">
        <label for="is_Admin">Is Admin</label>
        <select class="form-control" id="is_Admin" name="is_Admin" required>
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    <div>
      <button class="btn btn-danger" type="submit">Create</button>
    </div>
  </form>
</div>

@endsection
</x-admin-master>
