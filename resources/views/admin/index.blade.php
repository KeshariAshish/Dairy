<x-admin-master>

@section('content')

    @if(auth()->user()->is_Admin==0)
    <h1 class="h3 mb-4 text-gray-800">{{__('admin-master.You_do_not_have_permission_to_perform_operations')}}</h1>
        <p>{{__('admin-master.We_provide_best_quality_milk_to_our_customers_we_are_going_to_start_subscription_for_our_daily_customers_soon_which_will_help_us_to_maintain_a_good_relationship_between_us')}}</p>
    @endif

    @if(auth()->user()->is_Admin==1)
    <h1 class="h3 mb-4 text-gray-800">{{__('admin-master.You_have_permission_to_perform_operations')}}</h1>
        <p>{{__('admin-master.We_provide_best_quality_milk_to_our_customers_we_are_going_to_start_subscription_for_our_daily_customers_soon_which_will_help_us_to_maintain_a_good_relationship_between_us')}}</p>
    @endif



@endsection
</x-admin-master>
