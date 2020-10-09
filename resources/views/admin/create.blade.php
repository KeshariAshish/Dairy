<x-admin-master>

@section('content')

<h1>{{__('admin-master.Create_Users')}}</h1>

<form action="{{route('admin.store')}}" method="post" enctype="multipart/form-data">
@csrf

  <div class="row">
    <div class=" col-md-3 form-group">
      <label for="name">{{__('admin-master.name')}}</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="{{__('admin-master.enter_name')}}">
    </div>

    <div class="col-md-3 form-group">
      <label for="email">{{__('admin-master.email')}}</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="{{__('admin-master.enter_email')}}">
    </div>

    <div class="col-md-3 form-group">
      <label for="password">{{__('admin-master.password')}}</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="{{__('admin-master.enter_password')}}">
    </div>

    <div class="col-md-3 form-group">
      <label for="home_number">{{__('admin-master.home_number')}}</label>
      <input type="text" name="home_number" id="home_number" class="form-control" placeholder="{{__('admin-master.enter_home_number')}}">
    </div>

    <div class="col-md-3 form-group">
      <label for="address">{{__('admin-master.address')}}</label>
      <input type="text" name="address" id="address" class="form-control" placeholder="{{__('admin-master.enter_address')}}">
    </div>

    <div class="col-md-3 form-group">
      <label for="locality">{{__('admin-master.locality')}}</label>
      <input type="text" name="locality" id="locality" class="form-control" placeholder="{{__('admin-master.enter_location')}}">
    </div>

    <div class="col-md-3 form-group">
      <label for="city">{{__('admin-master.city')}}</label>
      <input type="text" name="city" id="city" class="form-control" placeholder="{{__('admin-master.enter_city')}}">
    </div>

    <div class="col-md-3 form-group">
      <label for="zip_code">{{__('admin-master.zip_code')}}</label>
      <input type="number" name="zip_code" id="zip_code" class="form-control" placeholder="{{__('admin-master.enter_zip_code')}}">
    </div>

    <div class="col-md-3 form-group">
      <label for="location">{{__('admin-master.location')}}</label>
      <input type="location" name="location" id="location" class="form-control" placeholder="{{__('admin-master.enter_location')}}">
    </div>

    <div class="col-md-3 mb-3">
        <label for="is_active">{{__('admin-master.active_customer')}}</label>
        <select class="form-control" id="is_active" name="is_active" required>
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
        </select>
    </div>

    <div class="col-md-3 form-group">
      <label for="phone">{{__('admin-master.phone')}}</label>
      <input type="number" name="phone" id="phone" class="form-control" placeholder="{{__('admin-master.enter_phone')}}">
    </div>

    {{-- <div class="form-group">
      <label for="created_by">Created By</label>
      <input type="text" name="created_by" id="created_by" class="form-control" value="{{auth()->user()->name}}">
    </div> --}}

    <div class="col-md-3 mb-3">
        <label for="is_Admin">{{__('admin-master.is_admin')}}</label>
        <select class="form-control" id="is_Admin" name="is_Admin" required>
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
        </select>
    </div>
    </div>

    <div>
      <button class="btn btn-primary mt-4" type="submit">{{__('admin-master.submit')}}</button>
      <a href="{{ route('admin.read') }}"><button class="btn btn-success mt-4 ml-2">{{__('admin-master.cancel')}}</button></a>
    </div>
  </form>


@endsection
</x-admin-master>
