<x-admin-master>

@section('content')

    @if(auth()->user()->is_Admin==0)
        <h1 class="h3 mb-4 text-gray-800">You don't have permission to perform operations</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Molestias totam corrupti animi iure, accusamus similique eum!
            Quisquam provident obcaecati aut delectus cumque unde. Beatae
            sequi architecto a praesentium officia ipsum.
        </p>
    @endif

    @if(auth()->user()->is_Admin==1)
        <h1 class="h3 mb-4 text-gray-800">You have permission to perform operations</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Molestias totam corrupti animi iure, accusamus similique eum!
            Quisquam provident obcaecati aut delectus cumque unde. Beatae
            sequi architecto a praesentium officia ipsum.
        </p>
    @endif



@endsection
</x-admin-master>
