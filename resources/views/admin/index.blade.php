<x-admin-master>

@section('content')

    @if(auth()->user()->is_Admin==0)
        <h1>Welcome {{auth()->user()->name}}</h1>
        {{-- <h4 class="h3 mb-4 text-gray-800">{{__('admin-master.You_do_not_have_permission_to_perform_operations')}}</h4> --}}
        <p>{{__('admin-master.We_provide_best_quality_products_to_our_customers_we_are_going_to_start_subscription_for_our_daily_customers_soon_which_will_help_us_to_maintain_a_good_relationship_between_us')}}</p>
        <h1 class="mt-5">{{__('admin-master.our_products')}}</h1>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Happy Customers</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Cow Milk</td>
                <td>500+</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Curd</td>
                <td>500+</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Paneer</td>
                <td>1000+</td>
              </tr>
            </tbody>
        </table>
    @endif

    @if(auth()->user()->is_Admin==1)
        <h1>Welcome {{auth()->user()->name}}</h1>
        {{-- <h4 class="h3 mb-4 text-gray-800">{{__('admin-master.You_have_permission_to_perform_operations')}}</h4> --}}
        <p>{{__('admin-master.We_provide_best_quality_products_to_our_customers_we_are_going_to_start_subscription_for_our_daily_customers_soon_which_will_help_us_to_maintain_a_good_relationship_between_us')}}</p>
        <h1 class="mt-5">{{__('admin-master.our_products')}}</h1>
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Happy Customers</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Cow Milk</td>
                <td>500+</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Curd</td>
                <td>500+</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Paneer</td>
                <td>1000+</td>
              </tr>
            </tbody>
        </table>
    @endif

@endsection
</x-admin-master>
